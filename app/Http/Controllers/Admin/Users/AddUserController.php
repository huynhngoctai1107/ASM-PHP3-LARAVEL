<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AddUserController extends Controller
{
    public $validate;
    public function  __construct(){
        $this->validate = new ValidateFromController();
    }
    function viewUser(){
        return view('admin.page.addEdit.user',['data'=>'']);
    }
    public function addUser(Request $request){

        if ($this->validate->validateFormAddUser($request)->fails()) {
            return Redirect::to('/admin/add-user')->withErrors($this->validate->validateFormAddUser($request))->withInput($request->input())->with(['data'=>'add']);
        }else{

            if($request->has('uploadfile')){
                $fileName = time().'-'.'imgUser'.'.'.$request->uploadfile->extension() ;
                $request->uploadfile->move(public_path("img/users"), $fileName);
                $request->merge(['image'=>$fileName]);
            }



            $dataArray = array(
                "name" => $request->fullName,
                "birthday" => $request->birthday,
                "email" => $request->email,
                "password" => $request->password,
                "gender" => $request->gender,
                "phone" => $request->phone,
                "social" => 0,
                "token" => strtoupper(Str::random(10)),
                "img"=> $request->image,
                "level"=>$request->level,
                "status"=>$request->status,
                "social" => $request->social

            );

            User::create($dataArray);
            return redirect('/admin/add-user')->with('add-user', "Đăng ký tài khoản thành công! Xin vui lòng kiểm tra email để kích hoạt tài khoản để tiếp tục sử dụng.");

        }

    }

}
