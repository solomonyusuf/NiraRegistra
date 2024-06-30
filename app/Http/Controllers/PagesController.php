<?php

namespace App\Http\Controllers;



use App\Charts\DashboardChart;
use Spatie\Async\Process;
use Spatie\Async\Pool;

class PagesController
{
   public static function dashboard()
   {
       $chart = new DashboardChart();
       $chart->labels(['One', 'Two', 'Three', 'Four']);
       $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
       $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

       return view('pages.dashboard', ['chart' => $chart]);
   }

   public static function test()
   {
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
