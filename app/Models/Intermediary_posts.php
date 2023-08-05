<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Intermediary_posts extends Model
{
    protected $table = 'intermediary_posts';
    use HasFactory;
    public function AddCategoryPost($value){
        return $this->insert($value);
    }
    public function DeletePost($id){
        return $this->where('id_posts', '=', $id)->delete();
    }
}
