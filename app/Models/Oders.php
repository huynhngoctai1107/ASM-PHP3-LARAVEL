<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oders extends Model
{
    use HasFactory;
    protected $table = "oders";
    public function getOrders($condition)
    {
        return $this
            ->where($condition)
            ->orderBy('oders.id', 'ASC')
            ->get();

    }

    public function addOrder($condition,$values){
        return $this->where($condition)->insertGetId($values);
    }
    public function getAllOrder($condition){
        return $this->where($condition)->paginate(5);
    
    }
    public function coutOder($condition,$value){
        return $this->where($condition)->count($value);
    
    }
    public function updateOrder($condition,$value){
        return $this->where($condition)->update($value);
    }
    public function getAll($condition){
        return $this->join('users','oders.id_user','=','users.id')->join('bills','bills.id_oder','=','oders.id')->join('products','bills.id_product','=','products.id')->where($condition)->get();
    }

}
