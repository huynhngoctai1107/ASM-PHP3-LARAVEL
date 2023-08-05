<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaProducts extends Model
{
    use HasFactory;
    protected $table = "media_products";
    public function AddMediaProduct($value){
        return $this
        ->insert($value);
    }
 
    public function DeleteMediaProduct($id){
        return $this
            ->where('id_product', '=', $id)->delete();
    }



}
