<?php

namespace App\Http\Controllers;

class PagesController
{
   public function dashboard()
   {
       return view('pages.dashboard');
   }
}
