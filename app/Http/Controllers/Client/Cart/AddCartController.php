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


    function addCart($slug, Request $request){
         
        $condition = [
            ['products.slug','=',$slug]
        ];
        $product = $this->product->getProduct($condition) ; 
      
        $user = Auth::user() ;
        // cắt hình trong chuỗi kí tự 
       
        
        $condition= [
            'id_product' =>$product->id_product , 
            'id_user' =>$user->id , 
        ]; 
       $getProduct = $this->cart->getCart($condition) ;

     
        if($getProduct){
            if($request->has('quantity')){
                 $addCart = [
                    'quantity' =>$getProduct->quantity + (int)$request->quantity ,
                    'total' =>$product->price * ($getProduct->quantity + (int)$request->quantity) ,
                ];
            
                $this->cart->updateCart($condition,$addCart);
                return Redirect()->back()->with('cart','Đặt hàng thành công !') ;

            }else if($request->has('quantityUpdate')){  
                  $addCart = [
                        'quantity' =>((int)$request->quantityUpdate-$getProduct->quantity)+$getProduct->quantity,
                        'total' => $product->price * (((int)$request->quantityUpdate-$getProduct->quantity)+$getProduct->quantity)
                    ];  
                        
                if( $addCart['quantity']==0){
                    $condition= [
                        'id_product' =>$product->id_product
                    ];  
                    $this->cart->deleteCart($condition);
                    return Redirect()->back()->with('cart','Sản phẩm đã bị xóa!') ;
        
                } 
                $this->cart->updateCart($condition,$addCart);
                return Redirect()->back()->with('cart','Cập nhật thành công !') ;
            }else{
                $addCart = [
                    'quantity' => $getProduct->quantity + 1 ,
                    'total' =>$product->price * ($getProduct->quantity + 1) ,
                ];
                $this->cart->updateCart($condition,$addCart);
                return Redirect()->back()->with('cart','Đặt hàng thành công !') ;
            }
         
        }else{
            $condition = [
                ['products.slug','=',$slug]
            ];
            $productimg = $this->product->getProductImg($condition);
            $imgProduct = explode(',', $productimg->img);
             for($i=0 ; $i <count( $imgProduct); $i++){
                $images =   $imgProduct[$i] ;
                break;
             }
            if($request->has('quantity')){
            $quantity = (int)$request->quantity;
            }else{
                $quantity = 1 ;
            }
            $addCart = [
                'id_user'=> $user->id,
                'id_product' => $product->id_product,
                'quantity'=>$quantity , 
                'price'=>$product->price ,
                'total' =>$product->price * $quantity ,
                'date_input'=> date('Y-m-d H:i:s'),
                'images'=>$images ,
                'name'=>$product->nameproduct,
                'token'=>$user->token,
            ];
            $this->cart->addCart($addCart);
           return Redirect()->back()->with('cart','Đặt hàng thành công !') ;

        }

    }

  
}

