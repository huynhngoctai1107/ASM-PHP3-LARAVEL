<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    public $oder ; 
    public $product ;
    public function __construct(){
        $this->oder = new Oders();
        $this->product = new Products();
    }
    function detailOrder($id){
        
            $conditionOder =[
               
                ['oders.id','=', $id],

            ];
           
           $product = [
            'value'=>$this->product->productImg(),
            'urlImg'=>'/img/products/',
           ];
         return view('admin.page.list.bill',['oder'=>$this->oder->getOneOder($conditionOder), 'product'=>$product,                     
        ]);
            
    }
    }

