<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use Illuminate\Http\Request;

class DeleteOrderController extends Controller
{
    public $oder ; 
 
    public function __construct(){
        $this->oder = new Oders();
     }
    function deleteOder($id_order){
            $condition =[
                ['id','=',$id_order],
                ['status','=',[0,4]],
                ['pay','=',3]
               
            ];
            $value = [
                'status' => 4
            ];
            if($this->oder->updateOrder($condition,$value)){
                return Redirect()->back()->with('order','Hủy đơn hàng thành công');

            }else{
                return Redirect()->back()->with('order-error','Đơn hàng đang vận chuyển hoặc đã thanh toán không thể hủy đơn hàng này !');
  
            }
       
            }
}
