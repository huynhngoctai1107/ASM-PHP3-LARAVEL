<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mail\ActiveMailController;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidateFromController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class ResetPasswordController extends Controller
{
    public $validate;
    public $check ;
    public $mail;
    public function __construct(){
        $this->validate = new ValidateFromController();
        $this->check = new User();
        $this->mail= new ActiveMailController();
    }
    function viewreset(){
        return view('client.page.forgetpassword');
    }
    function checkEmail(Request $request){
  
        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));
        if($score > 0.7) {
            if ($this->validate->validateFormForgetPassword($request)->fails()) {
                return  redirect()->back()->withErrors( $this->validate->validateFormForgetPassword($request))->withInput($request->input());
            }else{
                $condition= [
                    'email'=>$request->email,
                    'social'=>0
                  ];
                $user = $this->check->resetPassword($condition);
                
                if($user){
                     $this->mail->resetPassword($user) ;
                      return  redirect()->back()->with('success','Đã gửi email Reset mật khẩu thành công. Xin vui lòng kiểm tra email của bạn ');
                }else{
                    return  redirect()->back()->withInput($request->input())->with('error','Email không tồn tại trong hệ thống! Xin vui lòng kiểm tra lại');
                }
            }
       
        } else {
            return Redirect()->back()->with('error','Có thể bạn là robot, spam thì cút nhe');
        }

    }
    function fromPassword($token,$id){

        $user = $this->check->resetUser($id,$token);
        return view('client.page.resetpassword',['user'=>$user]);
    }
    function resetPassword($id,Request $request){

        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));
        if($score > 0.7) {
            if ($this->validate->validateFormResetPassword($request)->fails()) {
                return  redirect()->back()->withErrors( $this->validate->validateFormResetPassword($request))->withInput($request->input());
            }else{
                $values=[
                    'password'=>Hash::make($request->password),
                    'token'=> strtoupper(Str::random(10))
                ];
                $this->check->editUser($id,$values);
                return redirect('login')->with('resignter','Tạo lại mật khẩu thành công. Xin mời bạn đăng nhập');
            }
       
        } else {
            return Redirect()->back()->with('resetpassword','Có thể bạn là robot, spam thì cút nhe');
        }

   

    }

}
