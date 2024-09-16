<?php

namespace App\Http\Controllers;



use App\Charts\DashboardChart;
use App\Models\BulkEmail;
use App\Models\Calender;
use App\Models\DatabaseKey;
use App\Models\Day;
use App\Models\Month;
use App\Models\Payment;
use App\Models\Registra;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Async\Process;
use Spatie\Async\Pool;
use Webklex\IMAP\Facades\Client;

class PagesController
{
    public static function Login(Request $request)
    {
        try
        {
            $user = auth()?->user();
            if($user) return redirect(route('dashboard'));

            $input = $request->all();


            if(count($input['token']) == 6)
            {
                $token = implode('', $input['token']);

                $query_key = DatabaseKey::
                whereDate('approved_date', '=', Carbon::now()->toDate())->first();

                if(!$query_key)
                {
                    toast('No Database Key','error');
                    return redirect()->back();
                }
                if($query_key?->key != $token)
                {
                    toast('Token Invalid','error');
                    return redirect()->back();
                }


                $credential = array('email'=> $input['email'], 'password'=> $input['password']);

                if(auth()->attempt($credential, false))
                {
                    $user = auth()->user();

                    alert()->success("Welcome {$user?->first_name}", "Account login was successful");
                    return redirect()->route('dashboard');

                }
                else
                {
                    alert()->error("Invalid Credentials", "Sorry unable to login at the moment due to wrong credentials");
                    return redirect()->back();
                }
            }
            else
            {
                toast('Token Unrecognized','error');
                return redirect()->back();
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }
    public static function Dashboard()
   {
       $chart = new DashboardChart();

       $chart->labels(['2024']);
       $chart->dataset('Pricing', 'line', [10000000, 50000000, 100000000, 120000000])
           ->color('#028A0F');


       $profiles = Registra::count();
       $emails = BulkEmail::count();
       $schedule = Schedule::count();
       $payments = Payment::count();
       $users = User::count();

       return view('pages.dashboard', [
           'chart' => $chart,
           'profiles'=> $profiles,
           'emails'=> $emails,
           'schedule'=> $schedule,
           'payments'=> $payments,
           'users'=> $users,
       ]);
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
    public static function Logout()
    {
        auth()->logout();
        toast('Logout Succeeded', 'success');
        return redirect()->route('home');
    }
    public static function AllProfile()
    {
        $list = [];
        $search = \request()->search;
        if($search)
        {
            $list = Registra::where('company_name','like', "%{$search}%")
                ->orWhere('previous_names','like', "%{$search}%")
                ->orderBy('created_at', 'DESC')->get();
        }
        else $list = Registra::orderBy('created_at', 'DESC')->get();


        return view('pages.registras.list',['list'=> $list]);
    }
    public static function CreateProfile()
    {
        $countries = array(
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
            "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
            "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
            "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada",
            "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros",
            "Congo, Democratic Republic of the", "Congo, Republic of the", "Costa Rica",
            "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
            "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
            "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji",
            "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana",
            "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
            "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq",
            "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
            "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait",
            "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
            "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia",
            "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius",
            "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro",
            "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands",
            "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway",
            "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea",
            "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania",
            "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
            "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia",
            "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain",
            "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
            "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago",
            "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
            "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
            "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen",
            "Zambia", "Zimbabwe"
        );

        $states = array(
            "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue",
            "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu",
            "FCT - Abuja", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina",
            "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo",
            "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"
        );

        return view('pages.registras.create',['countries' => $countries, 'states'=> $states ]);
    }
    public static function EditProfile($id)
    {
        $countries = array(
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
            "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
            "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
            "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada",
            "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros",
            "Congo, Democratic Republic of the", "Congo, Republic of the", "Costa Rica",
            "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
            "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
            "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji",
            "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana",
            "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
            "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq",
            "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
            "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait",
            "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
            "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia",
            "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius",
            "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro",
            "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands",
            "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway",
            "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea",
            "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania",
            "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
            "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia",
            "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain",
            "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
            "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago",
            "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
            "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
            "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen",
            "Zambia", "Zimbabwe"
        );

        $states = array(
            "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue",
            "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu",
            "FCT - Abuja", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina",
            "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo",
            "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"
        );

        return view('pages.registras.edit',['id'=> $id,'countries' => $countries, 'states'=> $states ]);
    }
    public static function ViewProfile($id)
    {
        return view('pages.registras.view',['id'=> $id]);
    }
    public static function ExpiredProfile()
    {
        return view('pages.registras.expired');
    }
    public static function Educational()
    {
        return view('pages.educational');
    }
    public static function Forum()
    {
        return view('pages.forum');
    }
    public static function AllPayment()
    {
        $registra = Registra::get();
        return view('pages.payment.all', ['registra'=> $registra]);
    }
    public static function AllUsers()
    {
        $users = User::get();
        return view('pages.users', ['users'=> $users ]);
    }
    public static function Account($id)
    {
        $user = User::find($id);
        return view('pages.account', ['data'=> $user ]);
    }
    public static function Emails()
    {
        return view('pages.emails');
    }
    public static function Schedules()
    {
        AdminController::GenerateCalender();

        $year = env('year');

        $calender = Calender::where(['year'=> $year])->first()->id;
        $current = Month::where([
            'calender_id' => $calender,
            'name' => Carbon::now()->monthName
        ])->first();

        $months =  Month::where([
            'calender_id' =>  $calender
        ])->get();

        return view('pages.schedules',
            ['month' => $current,
            'months' => $months,
            'year'=> $year 
            ]);
    }



}
