<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
class DeleteProductController extends Controller
{
    function deleteProduct($slug){
        $delete = new Products();

        $condition = [
            ['slug','=',$slug]
        ];
        $value=[
            'status'=>1,
        ];
        if( $delete->editProduct($condition,$value) !=false){
            return redirect('/admin/list-products')->with('delete-product', "Xóa sản phẩm thành công");
        }else
        {
            return redirect('/admin/list-products')->with('error-product', "Xóa sản phẩm thất bại, danh mục hiện tại đang có đơn hàng ");

        }
    }
}
