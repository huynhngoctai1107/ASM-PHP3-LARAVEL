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

}
