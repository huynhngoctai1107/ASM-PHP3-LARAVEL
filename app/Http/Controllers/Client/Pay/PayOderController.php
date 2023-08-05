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
use Illuminate\Support\Facades\Redirect;

class PayOderController extends Controller
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
    public function payCart($id,$token, Request $request){
        $user = Auth::user() ;
       if($id == $user->id && $token == $user->token){

           if ($this->validate->validateFormOder($request)->fails()) {
               return Redirect()->back()->withErrors($this->validate->validateFormOder($request))->withInput($request->input());
           }else{
                   $values =[
                       'id_user'=>$user->id, 
                       'fullname'=>$request->name , 
                       'address'=>$request->address,
                       'total_money'=>$request->total, 
                       'phone'=>$request->phone,
                       'note'=>$request->note,    
                       'date_oder' => date('Y-m-d H:i:s'),
                   ]; 
                   $condition= [
                       ['status','=', 0],
                       ['id_user','=', $user->id],
                       ['quantity','>', 0],
                   ];

                   if($oder = $this->oder->addOrder($condition,$values)){
                       foreach($this->cart->getAllCart($condition) as $item){
                           $bills[]=[
                               'id_oder'=> $oder, 
                               'id_product' => $item->id_product ,
                               'quantity' => $item->quantity ,
                               'price'=>$item->price,
                           ];
                       }
                       $this->bill->addBill($bills);
                       $conditionUpdate= [
                           'id_user'=> $user->id,
                       ];
                       $valueUpdate = [
                           'status'=>1
                       ];
                       $this->cart->updateCart($conditionUpdate,$valueUpdate);
                       return Redirect('/acout')->with('status','Đặt hàng thành công ');
  
                   }else{
                       return view('client.page.404')  ;
                   }
                  
           }
       }else{
           return view('client.page.404')  ;
           

       }
           
   
       
 
   }
   public function error(){
       return view('client.page.404');
   }
}
