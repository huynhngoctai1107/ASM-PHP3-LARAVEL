<?php

namespace App\Http\Controllers\Admin\CategoryPosts;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Categories_post;
use App\Http\Controllers\ValidateFromController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AddCategoryController extends Controller
{
    public $validate;
    public function  __construct(){
        $this->validate = new ValidateFromController();
    }
    function viewCategory(){
        return view('admin.page.addEdit.categoryPost',['data'=>'']);


    }
    function addCategory(Request $request){
        if ($this->validate->validateFormAddCategoryPost($request)->fails()) {
            return Redirect::to('/admin/add-category-post')->withErrors($this->validate->validateFormAddCategoryPost($request))->withInput($request->input())->with(['data'=>'']);
        }else{

            $dataArray = [
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "note" => $request->contents,


            ];
            $add = new Categories_post();
            $add->addCategory($dataArray);

            return redirect('/admin/add-category-post')->with('add-post', "Thêm danh mục thành công !");

        }
    }

}
