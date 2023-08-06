<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class Categories_post extends Model
{
    use HasFactory;
    protected $table = 'categories_post';
    public function getAllCategories()
    {
        return $this->select('id','slug','name','note',DB::raw("COUNT(intermediary_posts.id_category) AS quantity"))
            ->where('status',0)
            ->rightJoin('intermediary_posts','intermediary_posts.id_category','=','categories_post.id')
             ->orderBy('id', 'desc')
            ->groupBy('id_category')
            ->get();

    }
    public function getAllCategory()
    {
        return $this->where('status',0)
              ->orderBy('id', 'desc')
              ->paginate(3);
    }

    public function addCategory($value){
        return $this
            ->insert($value);
    }
    public function getCategory($slug){
        return $this
            ->where([
                ['slug',$slug],
                ['status',0]
            ])->first();

    }
    public function editCategory($slug,$value){
        return $this->where([
            ['slug',$slug],
            ['status',0]])->update($value);

    }
    public function deletePost($slug)
    {
        return $this->where('slug','=',$slug)->update(['status' => 1]);

    }

}
