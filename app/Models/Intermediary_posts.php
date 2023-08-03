<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Intermediary_posts extends Model
{
    use HasFactory;
    public function AddCategoryPost($value){
        return DB::table('intermediary_posts')
        ->insert($value);
    }
    public function DeletePost($id){
        return DB::table('intermediary_posts')
            ->where('id_posts', '=', $id)->delete();
    }
}
