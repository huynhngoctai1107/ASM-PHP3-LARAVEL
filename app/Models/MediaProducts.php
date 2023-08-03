<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaProducts extends Model
{
    use HasFactory;
    public function AddMediaProduct($value){
        return DB::table('media_products')
        ->insert($value);
    }
//    public function EditMediaProduct($idProduct,$idMedia,$value){
//        return DB::table('media_products')->where([
//            ['id_product','=',$idProduct],
//            ['id','=',$idMedia],
//        ])->update($value);
//    }
    public function DeleteMediaProduct($id){
        return DB::table('media_products')
            ->where('id_product', '=', $id)->delete();
    }



}
