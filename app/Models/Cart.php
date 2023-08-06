<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    protected $table ="carts" ; 
    public function getAllCart($condition){
        return $this
        ->where($condition)->orderBy('id','desc')->get();
    }
    public function count($condition,$value){
        return $this->where($condition)->count($value);
    }
    public function addCart($value){
        return $this->insert($value);
    }
    public function sumTotal($condition){
        return $this->where($condition)->sum('total');

    }
    public function getCart($condition){
        return $this->where($condition)->first() ; 

    }
    public function updateCart($condition,$value){
        return $this->where($condition)->update($value) ;

    }

}
