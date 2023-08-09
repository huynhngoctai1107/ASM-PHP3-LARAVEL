<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function fix()
    {
        return view('client.page.404');
    }
}
