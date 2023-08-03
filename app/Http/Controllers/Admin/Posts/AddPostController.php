<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\Intermediary_posts;
use App\Models\MediaPosts;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddPostController extends Controller
{
    public $intermediary_posts;
    public $validate;
    public $post;
    public $media;

        public function  __construct(){
            $this->validate = new ValidateFromController();
            $this->post = new Posts();
            $this->media = new MediaPosts();
            $this->intermediary_posts = new Intermediary_posts();
        }
              function viewPost(){

                  $data=[
                      'categoryPost'=> $this->post->getAllCategories(),
                      'page' =>''

                  ];

                  return view('admin.page.addEdit.post',['data'=>$data]);
              }
          function addPost(Request $request){



              if ($this->validate->validateFormAddPost($request)->fails()) {
                $data=[
                    'categoryPost'=> $this->post->getAllCategories(),
                    'page' =>''

                ];
                  return Redirect::to('/admin/add-post')->withErrors($this->validate->validateFormAddPost($request))->withInput($request->input())->with(['data'=>$data]);
              }else{



                  $datapost = array(
                      "main_title" => $request->main_title,
                      "subtitles" => $request->subtitles,
                      "content" => $request->contents,
                      "date_input"=>date('Y-m-d'),
                      "compolation"=>auth()->user()->email,
                  );
                  $idpost=  $this->post->addPost($datapost);
                  $countCategory=count($request->category)  ;

                  $countImg=count($request->uploadfile)  ;

                  for($i=0; $i<$countCategory; $i ++ ){
                      $dataCategory = array(
                          "id_category" => $request->category[$i],
                          "id_posts"=> $idpost,
                      );
                      $this->intermediary_posts->AddCategoryPost($dataCategory);
                  }
                  for($i=0; $i<$countImg; $i ++ ){
                      $fileName = time().$i.'-'.'imgPost'.'.'.$request->uploadfile[$i]->extension() ;
                      $request->uploadfile[$i]->move(public_path("img/Posts"), $fileName);
                      $request->merge(['image'=>$fileName]);

                      $dataCategory = array(
                          "image" => $request->image,
                          "id_post"=> $idpost,
                      );
                      $this->media->AddMediaPost($dataCategory);
                  }
                  return redirect('/admin/add-post')->with('add-post', "Thêm bài viết thành công !");

              }

          }





}
