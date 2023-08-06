<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Intermediary_products extends Model
{
    use HasFactory;
    protected $table = 'intermediary_products';
    public function AddCategoryProduct($value){
        return $this->insert($value);
    }
    public function DeleteProduct($id){
        return $this->where('id_product', '=', $id)->delete();
    }



}
