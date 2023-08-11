<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    public $oder ; 
    public $product ;
    public function __construct(){
        $this->oder = new Oders();
        $this->product = new Products();
    }
    public function listOrder(){
      
        $condition=[
         
        ];
       
        $oderOfUser  = $this->oder->getOrdersPaginate($condition);
      
        return view('admin.page.list.order',['order'=>$oderOfUser,
                                        ]);

    }
  
}
