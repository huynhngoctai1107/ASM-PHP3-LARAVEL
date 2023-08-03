<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListsUserController extends Controller
{
    function listUsers(){
        $users = new User();

        $data=[
            'getUsers'=>$users->getAllUsers(),
            'numberOderUser'=>$users->numberOderUser(),
            'urlImg'=> 'img/users/',
        ];
        return view('admin.page.list.user',['data'=>$data]);
    }
}
