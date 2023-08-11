<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\MaillController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Facades\Agent;
 

class GoogleLoginController extends Controller
{

    public $user; 
    public $mail ;
    public function __construct(){
      $this->user = new User();
      $this->mail = new MaillController();
    }

    public function loginUsingGoogle()
    {
       return Socialite::driver('google')->redirect();
    }


    public function callbackFromGoogle(Request $request)
    {

      try { 
        $user = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect()->back();
    }
    $condition= [
      'email'=>$user->getEmail(),
    ];
    $condition1= [
      'email'=>$user->getEmail(),
      'social'=>0
    ];
    $existingUser = $this->user->resetPassword($condition);
    $checkUser = $this->user->resetPassword($condition1);
    if ($existingUser) {

        if($checkUser){
  
              return redirect()->back()->with('login', 'Đăng nhập thất bại email này đã tồn tại trong hệ thống. Xin vui lòng nhập Email và Mật khẩu để đăng nhập');
        }else{
              Auth::attempt(['email' => $user->getEmail(),'password'=> '11072003Tai@' , 'status' => 1]);
        
              if($this->mail->notification($request)==true){
                return redirect('acout')->with('status', 'Đăng nhập thành công và đã gửi email thông báo!');

              }else{

                return redirect('acout')->with('status', 'Đăng nhập thành công email xác nhận đã lỗi!');

              }
          
          }
    } else {
            if($checkUser){
              session()->flash('login', 'Đăng nhập thất bại email này đã tồn tại trong hệ thống. Xin vui lòng nhập Email và Mật khẩu để đăng nhập');
              return redirect()->back();
            }else{
                $newUser                    = new User;
                $newUser->social            = 1;
                $newUser->password          = Hash::make('11072003Tai@') ;
                $newUser->level             = 0;
                $newUser->status            = 1;
                $newUser->gender            = 'Khác';
                $newUser->token             =  strtoupper(Str::random(10));
                $newUser->name              = $user->getName();
                $newUser->email             = $user->getEmail();
                $newUser->img               = $user->getAvatar();
                $newUser->save();

                auth()->login($newUser, true);
              if($this->mail->notification($request)==true){
                return redirect('acout')->with('status', 'Đăng nhập thành công và đã gửi email thông báo!');

              }else{
                return redirect('acout')->with('status', 'Đăng nhập thành công email xác nhận đã lỗi!');

              }
              }
    }


    }




}
