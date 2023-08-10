<?php

namespace App\Http\Controllers\Client\Posts;

use App\Http\Controllers\Controller;
use App\Models\MediaPosts;
use App\Models\Posts;
use Illuminate\Http\Request;

class DetailPostController extends Controller
{


    public $post;
    public $media;

    public function  __construct(){
        $this->post = new Posts();
        $this->media = new MediaPosts();

    }
    function detailPost($slug){
   

        $condition=[
            'posts.slug' => $slug, 
            'posts.status'=>0 ,

        ];
        $data= [
            'urlImg'=> 'img/posts/',
            'post' => $this->post->getPost($condition),
            'images'=>$this->post->getPostImg($condition),
        ];
      
       $slugCategories = explode(',',$data['post']->slugcategory);



         foreach($slugCategories as $slugCategory){
            $values[]= $slugCategory;
        }
        $condition=[
            ['posts.status','=',0],
            ['categories_post.slug','=',[$values]]
        ];
         
        $similarPosts=[
            'post'=>$this->post->getCategoryPost($condition),
            'img'=>$this->post->PostImg(),
            'urlImg'=> 'img/posts/',
        ];

        return view('client.page.detailpost',[
            'data'=>$data,
            'similarPosts'=>$similarPosts
            ]);
    }
}
