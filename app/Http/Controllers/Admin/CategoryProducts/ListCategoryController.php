<?php

namespace App\Http\Controllers\Admin\CategoryProducts;

use App\Http\Controllers\Controller;
  
use App\Models\Categories_product;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{

   public function listCategoryProducts(){
        $listCategories = new Categories_product();
        $list=  $listCategories->getAllCategories();
        $data = [
          'list' => $list,
          'page' =>  'products',
        ];
        return view('admin.page.list.category',['data'=>$data]);
    }

}
