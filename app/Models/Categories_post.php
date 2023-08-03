<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class Categories_post extends Model
{
    use HasFactory;
    public function getAllCategories()
    {
        return $list = DB::table('Categories_post')
            ->select('id','slug','name','note',DB::raw("COUNT(intermediary_posts.id_category) AS quantity"))
            ->where('status',0)
            ->rightJoin('intermediary_posts','intermediary_posts.id_category','=','Categories_post.id')
             ->orderBy('id', 'desc')
            ->groupBy('id_category')
            ->get();

    }
    public function getAllCategory()
    {
        return $list = DB::table('Categories_post')
            
            ->where('status',0)
              ->orderBy('id', 'desc')
              ->paginate(3);
    }

    public function addCategory($value){
        return $add = DB::table('Categories_post')
            ->insert($value);
    }
    public function getCategory($slug){
        return DB::table('Categories_post')
            ->where([
                ['slug',$slug],
                ['status',0]
            ])->first();

    }
    public function editCategory($slug,$value){
        return DB::table('Categories_post')->where([
            ['slug',$slug],
            ['status',0]])->update($value);

    }
    public function deletePost($slug)
    {
        return DB::table('Categories_post')->where('slug','=',$slug)->update(['status' => 1]);

    }

}
