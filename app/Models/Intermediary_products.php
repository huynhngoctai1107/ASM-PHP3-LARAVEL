<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Intermediary_products extends Model
{
    use HasFactory;

    public function AddCategoryProduct($value){
        return DB::table('intermediary_products')
        ->insert($value);
    }
    public function DeleteProduct($id){
        return DB::table('intermediary_products')
            ->where('id_product', '=', $id)->delete();
    }



}
