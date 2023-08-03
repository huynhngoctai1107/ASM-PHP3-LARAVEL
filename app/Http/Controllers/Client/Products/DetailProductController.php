<?php

namespace App\Http\Controllers\Client\Products;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\Intermediary_products;
use App\Models\MediaProducts;
use App\Models\Products;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public $validate;
    public $product;
    public $media;

    public function  __construct(){
        $this->product = new Products();
        $this->media = new MediaProducts();

    }
    function detailProduct($id){


        $data= [
            'urlImg'=> 'img/products/',
            'product' => $this->product->getProduct($id),
            'images'=>$this->product->getProductImg($id),
        ];

       $slugCategory = explode(',',$data['product']->slugcategory);

        foreach($slugCategory as $slug){
            $values[]= $slug;
        }

        $similarProducts=[
            'product'=>$this->product->similarProducts($values),
            'img'=>$this->product->productImg(),
            'urlImg'=> 'img/products/',
        ];

        return view('client.page.detail',[
            'data'=>$data,
            'similarProducts'=>$similarProducts
            ]);
    }
}
