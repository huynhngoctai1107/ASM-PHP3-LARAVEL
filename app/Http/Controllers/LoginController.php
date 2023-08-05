<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ValidateFromController;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use App\Http\Controllers\MaillController;
class LoginController extends Controller
{
    protected $_validateFormLogin ;
    protected $mail ; 

    public function __construct(){
        $this->mail = new MaillController();
        $this->_validateFormLogin = new ValidateFromController();
    }

    public function login(Request $request)
    {
        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));
        if($score > 0.7) {
            if ($this->_validateFormLogin->validateFormLogin($request)->fails()) {
                return Redirect::to('login')->withErrors( $this->_validateFormLogin->validateFormLogin($request))->withInput($request->input());
            }else{
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'social'=>0])) {
                   
                    $acout =Auth::user();
               
                  if($acout->level == 0 ){

                        if($this->mail->notification($request)==true){
                            return redirect('/acout')->with('status', 'Đăng nhập thành công và đã gửi email thông báo!');
                        }else{
                            return redirect('/acout')->with('status', 'Đăng nhập thành công email xác nhận đã lỗi!');
                        }
                    
                  }else{
                    if($this->mail->notification($request)==true){
                        return redirect('/admin/')->with('status', 'Đăng nhập thành công và đã gửi email thông báo!');
                    }else{
                        return redirect('/admin/')->with('status', 'Đăng nhập thành công email xác nhận đã lỗi!');
                
                    }
 
                  }
                }else{       
                    return Redirect()->back()->withInput($request->input())->with('login', 'Đăng nhập thất bại vui lòng kiểm tra thông tin đăng nhập');
                }
            }
        } else {
            return Redirect()->back()->with('login','Có thể bạn là robot, spam thì cút nhe');
        }
        
       
       
    }
 
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

