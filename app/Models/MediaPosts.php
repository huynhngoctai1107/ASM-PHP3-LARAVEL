<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaPosts extends Model
{
    use HasFactory;
    protected $table = "media_posts";
    public function AddMediaPost($value){
        return $this
        ->insert($value);
    }
 
    public function DeleteMediaPost($id){
        return $this
            ->where('id_post', '=', $id)->delete();
    }
}
