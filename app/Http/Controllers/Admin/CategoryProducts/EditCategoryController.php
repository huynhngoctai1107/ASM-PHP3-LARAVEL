<?php

namespace App\Http\Controllers\Admin\CategoryProducts;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;

use App\Models\Categories_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class EditCategoryController extends Controller
{
    public $validate;
    public $listCategories;
    public function  __construct(){
        $this->validate = new ValidateFromController();
        $this->listCategories = new Categories_product();
    }
    function viewCategoryProduct($slug){
       
        $list= $this->listCategories->getCategory($slug);
        return view('admin.page.addEdit.categoryProduct',['data'=>$list]);

    }

    function editCategoryProduct($slug,Request $request)
    {
        $list= $this->listCategories->getCategory($slug); 
        if ($this->validate->validateFormEditCategoryProduct($request,$list->id)->fails()) {
            return Redirect()->back()->withErrors($this->validate->validateFormEditCategoryProduct($request,$list->id))->withInput($request->input());
        }else{

            $dataArray = [
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "note" => $request->contents,
            ];
            $add = new Categories_product();
            $add->editCategory($slug,$dataArray);

            return redirect('/admin/list-categories-product')->with('edit-category', "Chỉnh sửa danh mục thành công");

        }

    }
}
