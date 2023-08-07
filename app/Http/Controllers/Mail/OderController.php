<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OderController extends Controller
{
 function oder($oder){
    
    if($oder){
        Mail::send('client.mail.oder',compact('oder'),function($email) use($oder){
            $email->subject('Foody - Đơn hàng');
            $email->to($oder[0]->email,$oder[0]->fullname);

        });
     }
 }
}
