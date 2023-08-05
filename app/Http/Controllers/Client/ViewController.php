<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\Posts\ViewPostController;
use App\Http\Controllers\Client\Products\ViewProductController;
class ViewController extends Controller
{
    public $product ;
    public $post ;
    function __construct(){
        $this->post = new ViewPostController();
        $this->product = new ViewProductController() ;
    }
    function index(){
        $post = $this->post->getAllPost();
        $product = $this->product->getAllproduct();
        
        return view('client.page.index',[
            'data'=>$product,
            'post'=>$post,
        
            ]);

    }
    public function product()
    {
        $data = $this->product->getAllproduct();
        return view('client.page.product',['data'=>$data]);
    }
    public function lienhe()
    {
        return view('client.mail.oder');
    }
    public function about()
    {
        return view('client.page.about');
    }
    public function login()
    {
        return view('client.page.login');
    }
    public function blog()
    {
        $post = $this->post->getAllPost();
        $category =$this->post->categoryPost();
        return view('client.page.blog',[
            'data'=>$post,
            'category'=>$category]);
    }
    public function resignter()
    {
        return view('client.page.resignter');
    }
    public function user()
    {
        return view('client.page.user');
    }

    public function testimonial()
    {
        return view('client.page.testimonial');
    }
    public function fix()
    {
        return view('client.page.404');
    }
    public function feature()
    {
        return view('client.page.feature');
    }
    public function acout()
    {
        return view('client.page.acout');

    }



}
