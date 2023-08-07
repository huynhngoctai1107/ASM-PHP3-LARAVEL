<?php

namespace App\Http\Controllers\Client\Order;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewOderAcoutController extends Controller
{
    public $oder ; 
    public $product ;
    public function __construct(){
        $this->oder = new Oders();
        $this->product = new Products();
    }
    public function oderAcout(){
        $user = Auth::user();
 
        $condition = [
            ['oders.id_user','=',$user->id],

        ] ;
        $oderOfUser  = $this->oder->getOrders($condition);
        $condition = [
            ['id_user','=',$user->id],
        ] ;
        $countOder = $this->oder->coutOder($condition,'id_user');
        return view('client.page.acout',['oder'=>$oderOfUser,
                                        'count'=>$countOder,
                                        'product'=>'',
                                                     
                    ]);

    }
}
