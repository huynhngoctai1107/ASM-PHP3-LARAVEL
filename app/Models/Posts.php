<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    use HasFactory;
    protected $table = "posts";
    public function getAllCategories()
    {
        return  DB::table('categories_post')
            ->where('status',0)
            ->orderBy('id', 'desc')
            ->get();

    }
    public function addPost($value){
                    return $this
                ->insertGetId($value);
            }
        public function getPost($condition){
            return  $this->select('posts.id as id_posts','posts.slug','main_title','subtitles','content','posts.status as statuspost','date_input','compolation',DB::raw("GROUP_CONCAT(categories_post.slug) AS slugcategory"),DB::raw("GROUP_CONCAT(categories_post.id) AS idcategory"))
            ->leftJoin('intermediary_posts','posts.id','=','intermediary_posts.id_posts')
            ->join('categories_post','intermediary_posts.id_category','=','categories_post.id')
            ->where($condition)
            ->orderBy('id_posts','desc')
            ->groupby('id_posts')->first();
        }
    public function getPostImg($slug){
        return $this->select('posts.id as id_post',DB::raw("GROUP_CONCAT(media_posts.image) AS img"))
        ->join('media_posts','media_posts.id_post','=','posts.id')
        ->where('posts.slug','=', $slug)
        ->groupby('id_post')->first();
        }

    public function postAll($condition){
        return  $this->select('posts.id as id_posts','main_title','posts.slug','subtitles','compolation','content','posts.status as statuspost','date_input',DB::raw("GROUP_CONCAT(categories_post.slug) AS slugcategory"))
        ->leftJoin('intermediary_posts','posts.id','=','intermediary_posts.id_posts')
        ->join('categories_post','intermediary_posts.id_category','=','categories_post.id')
        ->where($condition)
        ->orderBy('id_posts','desc')
        ->groupby('id_posts')->paginate(5);
    }
    public function getCategoryPost($condition){
        return  DB::table('posts')->select('posts.id as id_posts','posts.slug','main_title','subtitles','compolation','content','posts.status as statuspost','date_input',DB::raw("GROUP_CONCAT(categories_post.slug) AS slugcategory"))
            ->leftJoin('intermediary_posts','posts.id','=','intermediary_posts.id_posts')
            ->join('categories_post','intermediary_posts.id_category','=','categories_post.id')
            ->where($condition)
            ->orderBy('id_posts','desc')
            ->groupby('id_posts')->get();
    }
    public function postlimit(){
        return  $this->select('posts.id as id_posts','main_title','subtitles','posts.slug','compolation','content','posts.status as statuspost','date_input',DB::raw("GROUP_CONCAT(categories_post.slug) AS slugcategory"))
            ->leftJoin('intermediary_posts','posts.id','=','intermediary_posts.id_posts')
            ->join('categories_post','intermediary_posts.id_category','=','categories_post.id')
            ->where('posts.status','=',0)
            ->orderBy('id_posts','desc')
            ->groupby('id_posts')->get();
    }

    public function postImg(){
    return $this->select('posts.id as id_post',DB::raw("GROUP_CONCAT(media_posts.image) AS img"))
    ->join('media_posts','media_posts.id_post','=','posts.id')
    ->where('posts.status','=',0)
    ->groupby('id_post')->get();
    }

    public function editPost($condition,$value){
        return $this->where($condition)->update($value);
    }
}
