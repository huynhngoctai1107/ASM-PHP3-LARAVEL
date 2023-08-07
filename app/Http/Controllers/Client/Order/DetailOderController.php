<?php

namespace App\Http\Controllers\Client\Order;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailOderController extends Controller
{
    public $oder ; 
    public $product ;
    public function __construct(){
        $this->oder = new Oders();
        $this->product = new Products();
    }
    function detailOder($id_user, $id_order){
        if($id_user ==  Auth::id()){
            $conditionOder =[
                ['id_user','=',$id_user], 
                ['oders.id','=', $id_order],

            ];
            $conditionCount = [
                ['id_user','=',Auth::id()],
            ] ;
           $product = [
            'value'=>$this->product->productImg(),
            'urlImg'=>'/img/products/',
           ];
         return view('client.page.acout',['oder'=>$this->oder->getOneOder($conditionOder),
                                        'count'=> $this->oder->coutOder($conditionCount,'id_user'),
                                        'product'=>$product
        ]);
            
        }else{
            return view('client.page.404')  ;
        }
    }
}
