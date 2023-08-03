<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DelectUserController extends Controller
{
   public function deleteUser($id){
       $users = new User();
         if( $users->delectUser($id) !=false){
             return redirect('/admin/list-users')->with('delete-user', "Xóa tài khoản thành công");
         }else
         {
             return redirect('/admin/list-users')->with('error-delete-user', "Xóa tài khoản thất bại, tài khoản hiện tại đang có đơn hàng ");

         }


   }
}
