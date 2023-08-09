<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Products;

class ViewController extends Controller
{
    public $product ;
    public $post;
    function __construct(){
        $this->post = new Posts();
        $this->product = new Products();
    }
    function index(){
       
       
        $dataPost=[
            'post'=>$this->post->postlimit(),
            'img'=>$this->post->postImg(),
            'urlImg'=> 'img/posts/',

        ];
        $dataProduct=[

            'product'=>$this->product->ClientProductAll(),
            'img'=>$this->product->productImg(),
            'urlImg'=> 'img/products/',
        ];
    

        return view('client.page.index',[
            'product'=>$dataProduct,
            'post'=>$dataPost,
        
            ]);

    }
   
  

    public function lienhe()
    {
        return view('client.page.contact');
    }
    public function about()
    {
        return view('client.page.about');
    }
    public function testimonial()
    {
        return view('client.page.testimonial');
    }


}
