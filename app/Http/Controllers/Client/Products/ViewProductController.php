<?php

namespace App\Http\Controllers\Client\Products;

 use App\Http\Controllers\Controller;
 
 
use App\Models\Products;
 
class ViewProductController extends Controller
{

    public $product ;
     public function __construct(){
        $this->product  = new Products();
 
    }
    public function product(){
    $data=[

        'product'=>$this->product->ClientProductAll(),
        'img'=>$this->product->productImg(),
        'urlImg'=> 'img/products/',
        "categoryProduct" => $this->product->getAllCategories(),
    ];

       
             return view('client.page.product',['data'=>$data]);
       
    }
}
