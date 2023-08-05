<?php

namespace App\Http\Controllers\Admin\CategoryPosts;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\Categories_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class EditCategoryController extends Controller
{
    public $validate;
    public $listCategories;
    public function  __construct(){
        $this->listCategories= new Categories_post();
        $this->validate = new ValidateFromController();
    }
    function viewCategoryPost($slug){
      
        $list= $this->listCategories->getCategory($slug);
        return view('admin.page.addEdit.categoryPost',['data'=>$list]);

    }

    function editCategoryPost($slug,Request $request)
    {
        $list= $this->listCategories->getCategory($slug);
       
        if ($this->validate->validateFormEditCategoryPost($request,$list->id)->fails()) {
            return Redirect()->back()->withErrors($this->validate->validateFormEditCategoryPost($request,$list->id))->withInput($request->input());
        }else{

            $dataArray = [
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "note" => $request->contents,
            ];
            $add = new Categories_post();
            $add->editCategory($slug,$dataArray);

            return redirect('/admin/list-categories-post')->with('edit-category', "Chỉnh sửa danh mục thành công");

        }

    }
}
