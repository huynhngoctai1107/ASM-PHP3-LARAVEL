<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\OderController;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;

class EditOrderController extends Controller
{

    public $oder;
    public $product;
    public $mail ; 
    public function __construct()
    {
        $this->mail =new OderController();
        $this->oder = new Oders();
        $this->product = new Products();
    }

    public function viewOrder($id)
    {
        $condition = [
            'oders.id' => $id,
        ];

        $oderOfUser = $this->oder->getOneOder($condition);

        return view('admin.page.addEdit.order', ['order' => $oderOfUser,
        ]);
    }
    public function editOrder(Request $request, $id)
    {
        $condition = [
            'oders.id' => $id,
        ];

        $oderOfUser = $this->oder->getOneOder($condition);
        if (empty($request->fullname)) {
            $fullname = $oderOfUser[0]->fullname;
        } else {
            $fullname = $request->fullname;
        }
        if (empty($request->phone_order)) {
            $phone_order = $oderOfUser[0]->phone_order;
        } else {
            $phone_order = $request->phone_order;
        }
        if (empty($request->address)) {
            $address = $oderOfUser[0]->address;
        } else {
            $address = $request->address;
        }
        if (empty($request->note)) {
            $note = $oderOfUser[0]->note;
        } else {
            $note = $request->note;
        }
        if (empty($request->pay)) {
            $pay = $oderOfUser[0]->pay;
        } else {
            $pay = $request->pay;
        }

    
         if($request->status == 3){
            return redirect('/admin/list-oders')->with('order-error','Cập nhật đơn hàng thất bại, đơn hàng giao thành công không thể chỉnh sửa');

         }else{
            $values = [
                'fullname' =>$fullname,
                'phone_order'=>$phone_order,
                'address' => $address , 
                'note' =>$note , 
                'pay' =>$pay, 
                'status' =>$request->status
             ];
            if($this->oder->updateOrder($condition,$values)){
                $this->mail->oder($this->oder->getOneOder($condition));
    
                return redirect('/admin/list-oders')->with('order','Cập nhật đơn hàng thành công');
    
             }else{
                return redirect('/admin/list-oders')->with('order-error','Cập nhật đơn hàng thất bại');
             }
         }
         



    }

}
