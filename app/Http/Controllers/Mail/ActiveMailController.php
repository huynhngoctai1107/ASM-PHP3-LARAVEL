<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActiveMailController extends Controller
{
  function ativeUser($user){
    
    if($user){
        Mail::send('client.mail.mail_active',compact('user'),function($email) use($user){
            $email->subject('Foody - Kích hoạt tài khoản');
            $email->to($user->email,$user->name);

        });
    }
  }
  function resetPassword($user){
    
 
        Mail::send('client.mail.resetpassword',compact('user'),function($email) use($user){
            $email->subject('Foody - Đặt lại mật khẩu');
            $email->to($user->email,$user->name);

        });
   
  }
}
