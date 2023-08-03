<?php

namespace App\Http\Controllers\Client\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories_post;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public $post ;
    public $categorypost;
    public function __construct(){
        $this->post  = new Posts();
        $this->categorypost = new Categories_post() ;
    }
    public function categoryPost(){
        return $this->categorypost->getAllCategories();
    }
    public function getPost($slug){
         $data=[

            'post'=>$this->post->getCategoryPost($slug),
            'img'=>$this->post->postImg(),
            'urlImg'=> 'img/posts/',
        
        ];
        return view("client.page.blog",[
            'data'=>$data,
            'category'=>$this->categorypost->getAllCategories(),  
        ]);
    }

  
}
