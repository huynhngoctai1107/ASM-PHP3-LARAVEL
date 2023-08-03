<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories_product extends Model
{
    use HasFactory;
    public function getAllCategories()
    {
        return $list = DB::table('Categories_product')
            ->where('status',0)
            ->orderBy('id', 'desc')
            ->paginate(3);

    }
    public function addCategory($value){
        return $add = DB::table('Categories_product')
            ->insert($value);
    }
    public function getCategory($slug){
        return $edit = DB::table('Categories_product')
            ->where([
                ['slug',$slug],
                ['status',0]
            ])->first();

    }
    public function editCategory($slug,$value){
        return $edit = DB::table('Categories_product')->where([
            ['slug',$slug],
            ['status',0]])->update($value);

    }
    public function deletePost($slug)
    {
        return $edit = DB::table('Categories_product')->where('slug','=',$slug)->update(['status' => 1]);


    }

}
