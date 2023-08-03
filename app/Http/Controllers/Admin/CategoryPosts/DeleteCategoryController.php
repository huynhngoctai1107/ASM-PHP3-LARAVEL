<?php

namespace App\Http\Controllers\Admin\CategoryPosts;

use App\Http\Controllers\Controller;
use App\Models\Categories_post;

use Illuminate\Http\Request;

class DeleteCategoryController extends Controller
{
    function deleteCategoryPost($slug){
        $delete = new Categories_post();
        if( $delete->deletePost($slug) !=false){
            return redirect('/admin/list-categories-post')->with('delete-category', "Xóa danh mục thành công");
        }else
        {
            return redirect('/admin/list-categories-post')->with('error-category-user', "Xóa danh mục thất bại, danh mục hiện tại đang có đơn hàng ");

        }
    }

}
