<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Oders;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderPdfController extends Controller
{

    public $oder; 

    public function __construct(){
        $this->oder = new Oders();

    }
    public function downloadPdf($id_user, $id_order){
        if(Auth::user()->id == $id_user){
            $getAllOderCondition= [
                'oders.id'=>$id_order,  
           ];  
           $order = $this->oder->getOneOder($getAllOderCondition);
           $pdf = PDF::loadView('client.pdf.order',['order'=>$order]);
           return $pdf->download('order.pdf');
        }else{
            return Redirect('/404');
        }
      

    }
}
