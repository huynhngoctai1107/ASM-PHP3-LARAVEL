<?php

namespace App\Http\Controllers\Admin\CategoryPosts;

use App\Http\Controllers\Controller;
use App\Models\Categories_post;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{

   public function listCategoryPost(){
        $listCategories = new Categories_post();
        $data = [
          'list' => $listCategories->getAllCategory(),
          'page' =>  '',
        ];
        return view('admin.page.list.category',['data'=>$data]);
    }

}
