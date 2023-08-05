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
            ->orderBy('oders.id', 'desc')
            ->get();

    }

    public function addOrder($condition,$values){
        return $this->where($condition)->insertGetId($values);
    }
    public function getAllOrder($condition){
        return $this->where($condition) ->paginate(3);
    
    }
    public function updateOrder($condition,$value){
        return $this->where($condition)->update($value);
    }
    public function getAll($condition ){
        return $this->select()->join('users','oders.id_user','=','users.id')->join('bills','bills.id_oder','=','oders.id')->join('products','bills.id_product','=','products.id')->where($condition)->get();
    }

}
