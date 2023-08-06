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
    public $product ;
    public function __construct(){
        $this->oder = new Oders();
        $this->product = new Products();
    }
    function deleteOder($id_user,$id_order){
        if($id_user == Auth::id() ){
            $condition =[
                'id_user' =>$id_user , 
                'id'  => $id_order,
            ];
            $value = [
                'status' => 4
            ];
            $this->oder->updateOrder($condition,$value);
            return Redirect()->back()->with('status','Xoá đơn hàng thành công');
        }else{
            return view('client.page.404')  ;
        }
    }
}
