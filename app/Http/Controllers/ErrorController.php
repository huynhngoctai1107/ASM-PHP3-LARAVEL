<?php

namespace App\Http\Controllers;
class ErrorController extends Controller
{

  
    public function fix()
    { 
         return view('client.page.404');     
    }
}
