<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class ViewController extends Controller
{
    function index(){
        return view('admin.page.dashboard');
    }
    function addCategory(){

        return view('admin.page.addEdit.category',['data'=>'add']);
    }


    function listCategories(){
        return view('admin.page.list.category');
    }
    function listProducts(){
        return view('admin.page.list.product');
    }

    function listOders(){
        return view('admin.page.list.oder');
    }
    function bill($id){
        echo $id;
        return view('admin.page.list.bill');
    }
    function editCategory($id){

        return view('admin.page.addEdit.category',['data'=>'edit']);
    }
  


}
