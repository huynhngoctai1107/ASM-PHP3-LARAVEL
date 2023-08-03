<?php

namespace App\Http\Controllers\Admin\CategoryProducts;

use App\Http\Controllers\Controller;
use App\Models\Categories_product;

use Illuminate\Http\Request;

class DeleteCategoryController extends Controller
{
    function deleteCategoryProduct($slug){
        $delete = new Categories_product();
        if( $delete->deletePost($slug) !=false){
            return redirect('/admin/list-categories-product')->with('delete-category', "Xóa danh mục thành công");
        }else
        {
            return redirect('/admin/list-categories-product')->with('error-category-user', "Xóa danh mục thất bại, danh mục hiện tại đang có đơn hàng ");

        }
    }

}
