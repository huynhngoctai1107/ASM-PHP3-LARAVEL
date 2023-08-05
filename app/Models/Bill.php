<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "bills";
    public function getBill($condition)
    {
        return $this
            ->where($condition)
            ->get();

    }

    public function addBill($values){
        return $this->insert($values);
    }
    public function getAllBill($condition){
        return $this->where($condition) ->paginate(3);
    
    }
    public function updateBill($condition,$value){
        return $this->where($condition)->update($value);
    }

}
