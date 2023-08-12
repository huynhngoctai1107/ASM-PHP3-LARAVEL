<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DelectUserController extends Controller
{
   public function deleteUser($id){
    if($id == Auth::user()->id){
        return redirect()->back()->with('error-delete-user', "Xóa tài khoản thất bại, tài khoản hiện tại đang hoạt động ");    
    }else{
        $users = new User();
        $values = [
         'status'=>0
        ];
          $users->editUser($id,$values);
         return redirect()->back()->with('delete-user', "Xóa tài khoản thành công"); 
    }
      


   }
}
