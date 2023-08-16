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
    public function getOrdersPaginate($condition)
    {
        return $this
            ->where($condition)
            ->orderBy('oders.status', 'asc')
            ->paginate(3);

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
  
    public function getOneOder($condition){
        return $this->select('oders.id','id_user','address','total_money','date_oder','fullname','id_product','products.name','phone_order','oders.status','note','email','quantity','bills.price','id_oder','slug','date_input','pay')
        ->join('users','oders.id_user','=','users.id')->join('bills','bills.id_oder','=','oders.id')->join('products','bills.id_product','=','products.id')->where($condition)->get();
    }
 
}
