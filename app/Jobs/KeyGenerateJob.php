<?php

namespace App\Jobs;

use App\Mail\KeyGenerateMail;
use App\Models\DatabaseKey;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Spatie\Async\Pool;

class KeyGenerateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         /***
                search previous keys
          **/
            $previous_keys = DatabaseKey::whereDate('approved_date', '=', now()->toDate())->first();


            if(!$previous_keys)
            {
                /***
                generate new keys
                 **/

               $key = DatabaseKey::create(array(
                    'key' => strval(rand(100000, 900000)),
                    'approved_date' => now()->toDate(),
                ));

                /***
                send new mails
                 **/
                foreach (User::get() as $item)
                {
                    Mail::to($item->email)->send(new KeyGenerateMail(
                        'Access Key Token',
                        $key->key));
                }

            }





    }
}
