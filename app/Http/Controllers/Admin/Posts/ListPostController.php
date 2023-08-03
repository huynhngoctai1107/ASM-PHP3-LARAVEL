<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;

use Illuminate\Http\Request;

class ListPostController extends Controller
{
    public $post ;
    public function __construct(){
        $this->post  = new Posts();
    }
    function listPosts(){
        $data=[

            'post'=>$this->post->postAll(),
            'img'=>$this->post->postImg(),
            'urlImg'=> 'img/Posts/',
        ];

        return view('admin.page.list.post',['data'=>$data]);

    }
}
