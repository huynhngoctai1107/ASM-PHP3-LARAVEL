<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\OderController;
use App\Http\Controllers\ValidateFromController;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PayOderController extends Controller
{
    public $cart ;
    public $product; 
    public $validate ;
    public $oder; 
    public $bill ; 
    public $mail;
    function __construct(){
        $this->validate = new ValidateFromController();
        $this->oder = new Oders();
        $this->bill = new Bill() ;
        $this->cart = new Cart();
        $this->product = new Products();
         $this->mail = new OderController();
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
                       'pay'=>$request->pay,
                       'date_oder' => date('Y-m-d H:i:s'),
                   ]; 
                   $condition= [
                       ['id_user','=', $user->id],
                   ];
                   if($request->pay == 3){
        
                        if($oder = $this->oder->addOrder($condition,$values)){
                            foreach($this->cart->getAllCart($condition) as $item){
                                $bills[]=[
                                    'id_oder'=> $oder, 
                                    'id_product' => $item->id_product ,
                                    'quantity' => $item->quantity ,
                                    'price'=>$item->price,
                                ]; 

                                $condition=[  
                                    ['id','=', $item->id],
                                ];
                                $this->cart->deleteCart($condition);

                            }
                            $this->bill->addBill($bills);
                            
                                $getAllOderCondition= [
                                    'oders.id'=>$oder,  
                                    ];  
                        
                            $this->mail->oder( $this->oder->getAll($getAllOderCondition));
                                return Redirect('/acout')->with('status','Đặt hàng thành công ');
        
                        }else{
                            return view('client.page.404')  ;
                        }

                      }elseif($request->pay==1){
                            $usd = $request->total / 23200;
                            dd(round($usd,2));
                      }else{
                        return view('client.page.404')  ;   
                        // thanh toan visa
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
