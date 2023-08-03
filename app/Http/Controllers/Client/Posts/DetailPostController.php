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
    function detailPost($id){


        $data= [
            'urlImg'=> 'img/posts/',
            'post' => $this->post->getPost($id),
            'images'=>$this->post->getPostImg($id),
        ];

       $slugCategory = explode(',',$data['post']->slugcategory);

        foreach($slugCategory as $slug){
            $values[]= $slug;
        }

        $similarPosts=[
            'post'=>$this->post->getCategoryPost($values),
            'img'=>$this->post->PostImg(),
            'urlImg'=> 'img/posts/',
        ];

        return view('client.page.detailpost',[
            'data'=>$data,
            'similarPosts'=>$similarPosts
            ]);
    }
}
