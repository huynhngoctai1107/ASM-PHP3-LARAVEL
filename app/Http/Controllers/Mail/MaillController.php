<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Facades\Agent;

class MaillController extends Controller
{
  function notification(Request $request){
    $browser = [
        'browser' => Agent::browser(),
        'version' => $request->schemeAndHttpHost(),
        'platform' => Agent::platform(),
        'time'=>date('Y-m-d H:i:s'),
        'method'=>'Google',
       ];
      
      $user = [
        'user' =>Auth::user(),
        'browser' => $browser,
      ];
     
      try {
        Mail::send('client.mail.notification',compact('user'),function($email) use($user){
            $email->subject('Foody - Thông báo đăng nhập');
            $email->to($user['user']->email , $user['user']->name);
        });
    
        return true;
    } catch (Exception $ex) {
         
        return false;
    }
       
  }
}
