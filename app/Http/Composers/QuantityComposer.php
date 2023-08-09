<?php


namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

Class QuantityComposer{
    public $cart; 
    public function __construct(){
        $this->cart = new Cart();
    }
    public function compose(View $view){

        if(Auth::check()){
            $user = Auth::user() ;
            $condition= [             
                          ['id_user','=', $user->id],
                      ];
       
          $view->with('numberQuantity',$this->cart->sumTotal($condition,'quantity'));
        }else{
            $view->with('numberQuantity',0);
        }
       
    }
}