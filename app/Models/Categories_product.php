<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories_product extends Model
{
    use HasFactory;
    protected $table ="Categories_product";
    public function getAllCategories()
    {
        return $this
            ->where('status',0)
            ->orderBy('id', 'desc')
            ->paginate(3);

    }
    public function addCategory($value){
        return $this
            ->insert($value);
    }
    public function getCategory($slug){
        return $this
            ->where([
                ['slug',$slug],
                ['status',0]
            ])->first();

    }
    public function editCategory($slug,$value){
        return $this->where([
            ['slug',$slug],
            ['status',0]])->update($value);

    }
    public function deletePost($slug)
    {
        return $this->where('slug','=',$slug)->update(['status' => 1]);


    }

}
