<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;

class DeleteCartController extends Controller
{
    public $cart ;
    public $product; 
     function __construct(){
         $this->cart = new Cart();
         $this->product = new Products();
     }
    public function deleteCart($id){
        $condition= [
            'id' =>$id
        ];  
        $value = [
            'status' => 1 ,
        ];
        $this->cart->updateCart($condition,$value);
        return Redirect()->back()->with('cart','Xóa sản phẩm thành công !') ;
        
    }
}
