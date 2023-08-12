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
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
 
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
                   if($request->pay == 4){
        
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

                      }elseif($request->pay==1 ||$request->pay==2){
                        $request->session()->forget('oder');
                        
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
                        session()->push('oder', $values);
                        $usd = (round($request->total / 23200,2));
                        $provider = new PayPalClient;

                       $provider->setApiCredentials(config('paypal'));
                       $paypalToken =$provider->getAccessToken();
                        $response =$provider->createOrder([
                        
                            "intent" => "CAPTURE",
                            "application_context"=>[
                                "return_url"=>route('paypal_success'),
                                "cancel_url"=>route('paypal_canel')
                            ],   
                            "purchase_units" => [
                               [ 
                                  "amount" => [
                                    "currency_code" => "USD",
                                    "value" => $usd
                                  ]
                               ]
                            ]
                         ]);
                      
                                if(isset($response['id']) && !empty($response['id'])){
                                    foreach($response['links'] as $link){
                                        if($link['rel'] ==='approve'){
                                            return Redirect()->away($link['href']);
                                        }
                                    }
                                }else{
                                    return Redirect()->back()->withErrors($this->validate->validateFormOder($request))->withInput($request->input());
                                }
   
                      }else{
                        $request->session()->forget('momo');
                        
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
                    session()->push('momo', $values);
                        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                        $partnerCode = 'MOMOBKUN20180529';
                        $accessKey = 'klm05TvNBzhg7h7j';
                        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                        $orderInfo = "Thanh toán qua MoMo";
                        $amount = $request->total;
                        $orderId = time() ."";
                        $redirectUrl = route('momo_success');
                        $ipnUrl = route('momo_success');
                        $extraData = "";

                            $requestId = time() . "";
                            $requestType = "payWithATM";
                           
                            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                            $signature = hash_hmac("sha256", $rawHash, $secretKey);
                            $data = array('partnerCode' => $partnerCode,
                                'partnerName' => "Test",
                                "storeId" => "MomoTestStore",
                                'requestId' => $requestId,
                                'amount' => $amount,
                                'orderId' => $orderId,
                                'orderInfo' => $orderInfo,
                                'redirectUrl' => $redirectUrl,
                                'ipnUrl' => $ipnUrl,
                                'lang' => 'vi',
                                'extraData' => $extraData,
                                'requestType' => $requestType,
                                'signature' => $signature);
                            $result =$this->execPostRequest($endpoint, json_encode($data));
                            $jsonResult = json_decode($result, true);  // decode json
                            
                            //Just a example, please check more in there
                       return redirect()->to($jsonResult['payUrl']);
                          
                          
                  
 
                      }

                  
           }
       }else{
           return view('client.page.404')  ;
           

       }
           
   
       
 
   }
   public function error(){
       return view('client.page.404');
   }

   public function execPostRequest($url, $data)
   {
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
               'Content-Type: application/json',
               'Content-Length: ' . strlen($data))
       );
       curl_setopt($ch, CURLOPT_TIMEOUT, 5);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
       //execute post
       $result = curl_exec($ch);
       //close connection
       curl_close($ch);
       return $result;
   }
}
