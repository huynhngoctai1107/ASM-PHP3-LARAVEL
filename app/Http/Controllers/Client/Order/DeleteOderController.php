<?php

namespace App\Http\Controllers\Client\Order;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DeleteOderController extends Controller
{
    public $oder ; 
 
    public function __construct(){
        $this->oder = new Oders();
     }
    function deleteOder($id_user,$id_order){
        if($id_user == Auth::id() ){

       $condition =[
                ['id','=',$id_order],
                ['status','=',[0,4]],
                [ 'id_user','=',$id_user],
                ['pay','=',3]
               
            ];
            $value = [
                'status' => 4
            ];
            if($this->oder->updateOrder($condition,$value)){
                return Redirect()->back()->with('status','Hủy đơn hàng thành công');

            }else{
                return Redirect()->back()->with('error','Đơn hàng đang vận chuyển hoặc đã thanh toán không thể hủy đơn hàng này !');
            }            
         }else{
            return view('client.page.404')  ;
        }
    }
}
