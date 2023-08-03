<?php

namespace App\Http\Controllers\Client\Products;

use App\Http\Controllers\Client\Categories\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\Intermediary_products;
use App\Models\MediaProducts;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Redirect;
class ViewProductController extends Controller
{

    public $product ;
    public $categoryProduct;
    public function __construct(){
        $this->product  = new Products();
        $this->categoryProduct = new ProductController();

    }
    public function getAllproduct(){
    $data=[

        'product'=>$this->product->ClientProductAll(),
        'img'=>$this->product->productImg(),
        'urlImg'=> 'img/products/',
        "categoryProduct" => $this->categoryProduct->categoryProduct(),
    ];

         return $data ;
    }
}
