<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use App\Http\Controllers\Mail\ActiveMailController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ValidateFromController;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class ResignterController extends Controller
{

    protected $_validateFormResignter ;
    protected $mail ;
    public function __construct(){
        $this->mail= new ActiveMailController();
        $this->_validateFormResignter = new ValidateFromController();
    }
    public function resignterView()
    {
        return view('client.page.resignter');
    }

    public function  resignter(Request $request)
    {
        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));

        
        if($score > 0.7) {
            if ($this->_validateFormResignter->validateFormResignter($request)->fails()) {
                return Redirect()->back()->withErrors($this->_validateFormResignter->validateFormResignter($request))->withInput($request->input());
           }
           else {

               $dataArray = array(
                   "name" => $request->name,
                   "birthday" => $request->birthday,
                   "email" => $request->email,
                   "password" => $request->password,
                   "gender" => $request->gender,
                   "phone" => $request->phone,
                   "social" => 0,
                   "token" => strtoupper(Str::random(10)),
               );
               $user = User::create($dataArray);
               $this->mail->ativeUser($user);
               return redirect('/login')->with('resignter', "Đăng ký tài khoản thành công! Xin vui lòng kiểm tra email để kích hoạt tài khoản để tiếp tục sử dụng.");
           }
   
               
        
            // require additional email verification
        } else {
            return Redirect()->back()->with('resigter','Có thể bạn là robot, spam thì cút nhe');
        }

    

    }
    public function active($token, $id){

             DB::table('users')
              ->where([
                'id'=> $id,
                'token' =>$token ])
              ->update(['status' => 1]);
              return redirect('/login')->with('resignter', 'Kích hoạt tài khoản thành công!');


    }
}
