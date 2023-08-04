<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AddCartController extends Controller
{
    public $cart ;
   public $product; 
    function __construct(){
        $this->cart = new Cart();
        $this->product = new Products();
     
    }


    function addCart($id, Request $request){
        
        $product = $this->product->getProduct($id) ; 
        $productimg = $this->product->getProductImg($id);
        $user = Auth::user() ;
        // cắt hình trong chuỗi kí tự 
        $imgProduct = explode(',', $productimg->img);
         for($i=0 ; $i <count( $imgProduct); $i++){
            $images =   $imgProduct[$i] ;
            break;
         }
        
        $condition= [
            'id_product' =>$id , 
            'status' => 0,
        ]; 
       $getProduct = $this->cart->getCart($condition) ;
        
        if($getProduct){
            
            if($request->has('quantity')){
 
                 $addCart = [
                    'quantity' =>$getProduct->quantity + (int)$request->quantity ,
                ];
            
                $this->cart->updateCart($condition,$addCart);
                return Redirect()->back()->with('cart','Đặt hàng thành công !') ;

            }else if($request->has('quantityUpdate')){  
                  $addCart = [
                        'quantity' =>((int)$request->quantityUpdate-$getProduct->quantity)+$getProduct->quantity,
                    ];
                        
                $this->cart->updateCart($condition,$addCart);
                return Redirect()->back()->with('cart','Cập nhật thành công !') ;
            }else{
                $addCart = [
                    'quantity' => $getProduct->quantity + 1 
                ];
                $this->cart->updateCart($condition,$addCart);
                return Redirect()->back()->with('cart','Đặt hàng thành công !') ;
            }
         
        }else{
            $addCart = [
                'id_user'=> $user->id,
                'id_product' => $id,
                'quantity'=> 1 , 
                'price'=>$product->price ,
                'date_input'=> date('Y-m-d H:i:s'),
                'images'=>$images ,
                'name'=>$product->nameproduct,
            ];
            $this->cart->addCart($addCart);
           return Redirect()->back()->with('cart','Đặt hàng thành công !') ;

        }
    }

  
}

