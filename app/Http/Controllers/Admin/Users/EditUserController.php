<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Http\Controllers\ValidateFromController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
class EditUserController extends Controller
{
    public $validate;
    public function  __construct(){
        $this->validate = new ValidateFromController();
    }
    function viewEdit($id){
        $users = new User();
        $user= $users->getUser($id);
        return view('admin.page.addEdit.user',['data'=>$user]);
    }
   public function editUser($id, Request $request){
    if ($this->validate->validateFormEditUser($request,$id)->fails()) {
        return Redirect::to("/admin/edit-user/$id")->withErrors($this->validate->validateFormEditUser($request,$id))->withInput($request->input());
    }else{

        if($request->has('uploadfile')){
            $fileName = time().'-'.'imgUser'.'.'.$request->uploadfile->extension() ;
            $request->uploadfile->move(public_path("img/users"), $fileName);
            $request->merge(['image'=>$fileName]);
        }



        $dataArray =[
            "name" => $request->fullName,
            "birthday" => $request->birthday,
            "email" => $request->email,
            "gender" => $request->gender,
            "phone" => $request->phone,
            "social" => 0,
            "token" => strtoupper(Str::random(10)),
            "img"=> $request->image,
            "level"=>$request->level,
            "status"=>$request->status,
        

        ];


        $users = new User();
        $user= $users->editUser($id,$dataArray);
        return redirect('/admin/list-users')->with('edit-user', "Chỉnh sửa tài khoản thành công ");

    }
   }
}
