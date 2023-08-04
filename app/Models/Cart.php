<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    public function getAllCart($condition){
        return DB::table('carts')->select('id_product','id','name','id_user','quantity','price','images','date_input')
        ->where($condition)->orderBy('id','desc')->get();
    }
    public function count($condition,$value){
        return DB::table('carts')->where($condition)->count($value);
    }
    public function addCart($value){
        return DB::table('carts')->insert($value);
    }
    public function sumTotal($condition){
        return DB::table('carts')->where($condition)->sum('quantity') * DB::table('carts')->where($condition)->sum('price');

    }
    public function getCart($condition){
        return DB::table('carts')->where($condition)->first() ; 

    }
    public function updateCart($condition,$value){
        return DB::table('carts')->where($condition)->update($value) ;

    }

}
