<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class DeletePostController extends Controller
{
    function deletePost($id){
        $delete = new Posts();
        if( $delete->deletePost($id) !=false){
            return redirect('/admin/list-posts')->with('delete-post', "Xóa bài viết thành công");
        }else
        {
            return redirect('/admin/list-posts')->with('error-post', "Xóa sản phẩm thất bại, danh mục hiện tại đang có đơn hàng ");

        }
    }
}
