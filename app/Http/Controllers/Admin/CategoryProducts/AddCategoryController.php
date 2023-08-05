<?php

namespace App\Http\Controllers\Admin\CategoryProducts;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\ValidateFromController;
use App\Models\Categories_product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AddCategoryController extends Controller
{
    public $validate;
    public function  __construct(){
        $this->validate = new ValidateFromController();
    }
    function viewCategory(){
        return view('admin.page.addEdit.categoryProduct',['data'=>'']);


    }
    function addCategory(Request $request){
        if ($this->validate->validateFormAddCategoryProduct($request)->fails()) {
            return Redirect()->back()->withErrors($this->validate->validateFormAddCategoryProduct($request))->withInput($request->input())->with(['data'=>'']);
        }else{

            $dataArray = [
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "note" => $request->contents,


            ];
            $add = new Categories_product();
            $add->addCategory($dataArray);

            return redirect()->back()->with('add-post', "Thêm danh mục thành công !");

        }
    }

}
