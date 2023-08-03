<?php

namespace App\Http\Controllers\Client\Posts;

use App\Http\Controllers\Client\Categories\PostController;
use App\Http\Controllers\Controller;
use App\Models\Categories_post;
use App\Models\Posts;
use Illuminate\Http\Request;

class ViewPostController extends Controller
{
    public $post ;
    public $categorypost;
    public function __construct(){
        $this->post  = new Posts();
        $this->categorypost = new Categories_post();

    }
   
 
    public function getAllPost(){
        $data=[

            'post'=>$this->post->postlimit(),
            'img'=>$this->post->postImg(),
            'urlImg'=> 'img/posts/',

        ];

        return $data ;
    }
    public function categoryPost(){
        return $this->categorypost->getAllCategories();
    }
}
