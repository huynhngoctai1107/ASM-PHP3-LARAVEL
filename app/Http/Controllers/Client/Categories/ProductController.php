<?php

namespace App\Http\Controllers\Client\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories_product;
use App\Models\Products;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public $product ;
    public $categoryProduct;
    public function __construct(){
        $this->product  = new Products();
        $this->categoryProduct = new Categories_product() ;
    }
    public function getProduct($slug){
        $condition=[
            'categories_product.slug' => $slug, 
            'categories_product.status'=>0 ,

        ];
        $data=[

            'product'=>$this->product->getCategoryProduct($condition),
            'img'=>$this->product->productImg(),
            'urlImg'=> 'img/products/',
            "categoryProduct" => $this->product->getAllCategories(),
        ];
        $link = str_replace(url('/'), '', url()->previous());

        if($link == '/index'){
            $url = 'index';
        }else if($link == '/'){
            $url = 'index';
        }else{
            $url = 'product';
        }

        return view("client.page.$url",['data'=>$data]);
    }

    public function categoryProduct(){
        return $this->product->getAllCategories();
    }
}
