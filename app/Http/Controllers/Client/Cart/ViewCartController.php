<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewCartController extends Controller
{
    public $cart ;
    public $product; 
     function __construct(){
         $this->cart = new Cart();
         $this->product = new Products();
      
     }
    function shoppingCart(){
        $user = Auth::user() ;
            $condition= [
                ['status','=', 0],
                ['id_user','=', $user->id],
                ['quantity','>', 0],
            ];

        return view('client.page.shoppingcart',['data'=>$this->cart->getAllCart($condition),
                                                'number'=>$this->cart->count($condition,'id_user'),
                                                   'total'=>$this->cart->sumTotal($condition)]);
    }
}
