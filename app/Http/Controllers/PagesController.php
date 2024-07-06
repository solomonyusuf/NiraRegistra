<?php

namespace App\Http\Controllers;



use App\Charts\DashboardChart;
use App\Models\Calender;
use App\Models\Day;
use App\Models\Month;
use App\Models\Registra;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Async\Process;
use Spatie\Async\Pool;
use Webklex\IMAP\Facades\Client;

class PagesController
{
   public static function Dashboard()
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

    public static function AllProfile()
    {
        return view('pages.registras.list');
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

        $year = "20".(Carbon::now()->yearOfMillennium() + 1);

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
