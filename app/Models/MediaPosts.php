<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaPosts extends Model
{
    use HasFactory;

    public function AddMediaPost($value){
        return DB::table('media_posts')
        ->insert($value);
    }
 
    public function DeleteMediaPost($id){
        return DB::table('media_posts')
            ->where('id_post', '=', $id)->delete();
    }
}
