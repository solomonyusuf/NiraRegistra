<?php

namespace App\Http\Controllers;



use App\Charts\DashboardChart;
use Spatie\Async\Process;
use Spatie\Async\Pool;
use Webklex\IMAP\Facades\Client;

class PagesController
{
   public static function dashboard()
   {
       $chart = new DashboardChart();

       $chart->labels(['One', 'Two', 'Three', 'Four']);
       $chart->dataset('1ST Quarter', 'line', [0, 1, 2, 3])
           ->color('#028A0F');
       $chart->dataset('2ND Quarter', 'line', [1, 3, 4, 6])
           ->color('purple');
       $chart->dataset('3ND Quarter', 'line', [0, 5, 4, 3])
           ->color('blue');
       $chart->dataset('4TH Quarter', 'line', [0, 2, 3, 5])
           ->color('red');

       return view('pages.dashboard', ['chart' => $chart]);
   }

   public static function test()
   {

       $client = Client::account('default');
       $client->connect();

       $folder = $client->getFolder('INBOX');
       $messages = $folder->query()->all()->get();

       foreach ($messages as $message) {
           echo $message->getSubject() . "<br />";
           echo $message->getHTMLBody(true);
       }


       // Initialize an array to store the results
       $results = [];

       $pool = Pool::create();

       $pool[] = async(function () {
           return "try1";
       })->then(function ($output) use (&$results) {
           $results['first'] = $output;
       });


       $pool[] = async(function () {
           return "try2";
       })->then(function ($output) use (&$results) {
           $results['sec'] = $output;
       });

       $pool[] = async(function () {
           return "try3";
       })->then(function ($output) use (&$results) {
           $results['trd'] = $output;
       });

       await($pool);

       dd($results);
   }
}
