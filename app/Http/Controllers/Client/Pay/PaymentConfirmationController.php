<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentConfirmationController extends Controller
{
    public $cart ;
    public $product; 
    public $validate ;
    public $oder; 
    public $bill ; 
    function __construct(){
        $this->validate = new ValidateFromController();
        $this->oder = new Oders();
        $this->bill = new Bill() ;
        $this->cart = new Cart();
        $this->product = new Products();
     
    }
    public function paymentConfirmation($id,$token,Request $request){
        
        $user = Auth::user() ;
            if($id == $user->id && $token == $user->token){
              $condition= [             
                            ['id_user','=', $user->id],
                        ];
                if($this->cart->sumTotal($condition,'total')>0){
                    return view('client.page.paycart',[ 'data'=>$this->cart->getAllCart($condition),
                    'number'=>$this->cart->count($condition,'id_user'),
                    'total'=>$this->cart->sumTotal($condition,'total')]);
                }else{
                    return view('client.page.404')  ;
                }


                   
            }else{
                
                return view('client.page.404')  ;
            }
     
    }
}
