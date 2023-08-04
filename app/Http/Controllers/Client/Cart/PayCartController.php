<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayCartController extends Controller
{   
    public $cart ;
    public $product; 
    public $oder; 
    public $bill ; 
    function __construct(){
        $this->oder = new Oders();
        $this->bill = new Bill() ;
        $this->cart = new Cart();
        $this->product = new Products();
     
    }
    public function paymentConfirmation($id,$token,Request $request){
        $user = Auth::user() ;
            if($id == $user->id && $token == $user->remember_token){
               if($request->total){
                        $condition= [
                            ['status','=', 0],
                            ['id_user','=', $user->id],
                            ['quantity','>', 0],
                        ];
                    return view('client.page.paycart',[ 'data'=>$this->cart->getAllCart($condition),
                                                        'number'=>$this->cart->count($condition,'id_user'),
                                                        'total'=>$this->cart->sumTotal($condition)]);
               }else{
                return view('client.page.404')  ;
               }

            }else{
                return view('client.page.404')  ;
            }
     
    }
    public function payCart($id,$token, Request $request){
        dd($request->all());
    }
}
