<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\OderController;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Oders;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class StatusPaypalController extends Controller
{


    public $cart ;
    public $product; 
 
    public $oder; 
    public $bill ; 
    public $mail;
      
    function __construct(){
       
        $this->oder = new Oders();
        $this->bill = new Bill() ;
        $this->cart = new Cart();
      
        $this->mail = new OderController();
 
    }
        public function sussess(Request $request){
            
            $provider = new PayPalClient;
            $paypalToken =$provider->getAccessToken();
            $provider->setApiCredentials(config('paypal'));
            $response = $provider->capturePaymentOrder($request->token);
            if(isset($response['error'])){
                return Redirect('/404');    
            }else{

                $values =$request->session()->get('oder');
                
                $condition= [
                    ['id_user','=', $values[0]['id_user']],
                ]; 
                if($oder = $this->oder->addOrder($condition,$values[0])){
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

                session()->forget('oder');
            
                return Redirect('/acout')->with('status','Đặt hàng thành công ');
            }
           
           
        }
        public function canel(){
            return Redirect('/404');
        }
}
