<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidateFromController;
use App\Models\Intermediary_posts;
use App\Models\MediaPosts;
use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EditPostController extends Controller
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

    function viewEdit($slug){

        $condition=[
            'posts.slug' => $slug, 
            'posts.status'=>0 ,

        ];
        $data= [
            'categoryPost'=> $this->post->getAllCategories(),
            'page' =>'edit',
            'post' => $this->post->getPost($condition),
            'images'=>$this->post->getPostImg($condition),

        ];
        return view('admin.page.addEdit.post',['data'=>$data]);
    }
    function editPost($slug,Request $request){
       
        $condition=[
            'posts.slug' => $slug, 
            'posts.status'=>0 ,

        ];
        if ($this->validate->validateFormEditPost($request)->fails()) {

            $data= [
                'categoryPost'=> $this->post->getAllCategories(),
                'page' =>'edit',
                'post' => $this->post->getPost($condition),
                'images'=>$this->post->getPostImg($condition),

            ];
            return Redirect()->back()->withErrors($this->validate->validateFormEditPost($request))->withInput($request->input())->with(['data'=>$data]);
        }
        else{
           
            $dataPost =[
                "main_title" => $request->main_title,
                "subtitles" => $request->subtitles,
                "content" => $request->contents,
                "slug"=>Str::slug($request->main_title),
                "date_input"=>$request->date_input,
                "compolation"=>auth()->user()->email,
            ];
            

            $condition = [
                ['posts.slug','=',$slug]
            ];
       
          

                $this->post->editPost($condition,$dataPost) ;
                $this->intermediary_posts->DeletePost($request->id);
                $countCategory=count($request->category)  ;
                for($i=0; $i<$countCategory; $i ++ ){
                    $dataCategory = array(
                        "id_category" => $request->category[$i],
                        "id_posts"=> $request->id,
                    );
                    $this->intermediary_posts->AddCategoryPost($dataCategory);
                }
            if(empty($request->uploadfile)){

            }else {
                $this->media->DeleteMediaPost($request->id);
                $countImg=count($request->uploadfile)  ;
                for ($i = 0; $i < $countImg; $i++) {
                    $fileName = time() . $i . '-' . 'imgPost' . '.' . $request->uploadfile[$i]->extension();
                    $request->uploadfile[$i]->move(public_path("img/posts"), $fileName);
                    $request->merge(['image' => $fileName]);
                    $dataCategory = array(
                        "image" => $request->image,
                        "id_post" => $request->id,
                    );
                    $this->media->AddMediaPost($dataCategory);
                }
            }

                return redirect('/admin/list-posts')->with('edit-post', "Chỉnh sửa bài viết thành công !");





        }

    }
}
