<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;

use App\Models\Products;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public $product ;
    public function __construct(){
        $this->product  = new Products();
    }
    public function listProducts(){
    $data=[
       
        'product'=>$this->product->productAll(),
        'img'=>$this->product->productImg(),
        'urlImg'=> 'img/products/',
    ];
 
        return view('admin.page.list.products',['data'=>$data]);
    }
}
