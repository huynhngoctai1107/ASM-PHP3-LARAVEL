<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    
    use HasFactory;

    protected $table = 'products';



     public function getProduct($id){

        return  DB::table('products')->select('products.id as id_product','products.name as nameproduct','content','describe','price','date_input','products.status as statusproduct',DB::raw("GROUP_CONCAT(categories_product.slug) AS slugcategory"),DB::raw("GROUP_CONCAT(categories_product.id) AS idcategory"))
        ->leftJoin('intermediary_products','products.id','=','intermediary_products.id_product')
        ->join('categories_product','intermediary_products.id_category','=','categories_product.id')
        ->where('products.id','=',$id)
        ->orderBy('id_product','desc')
        ->groupby('id_product')->first();
    }
    public function getCategoryProduct($slug){

        return  $this->select('products.id as id_product','products.name as nameproduct','content','describe','price','date_input','products.status as statusproduct',DB::raw("GROUP_CONCAT(categories_product.slug) AS slugcategory"),DB::raw("GROUP_CONCAT(categories_product.id) AS idcategory"))
            ->leftJoin('intermediary_products','products.id','=','intermediary_products.id_product')
            ->join('categories_product','intermediary_products.id_category','=','categories_product.id')
            ->where([
                ['products.status','=',0],
                ['categories_product.slug','=',$slug]
            ])
            ->orderBy('id_product','desc')
            ->groupby('id_product')->get();
    }
    public function similarProducts($value){

        return  $this->select('products.id as id_product','products.name as nameproduct','content','describe','price','date_input','products.status as statusproduct',DB::raw("GROUP_CONCAT(categories_product.slug) AS slugcategory"),DB::raw("GROUP_CONCAT(categories_product.id) AS idcategory"))
            ->leftJoin('intermediary_products','products.id','=','intermediary_products.id_product')
            ->join('categories_product','intermediary_products.id_category','=','categories_product.id')
            ->where('categories_product.slug','=',[$value])
            ->orderBy('id_product','desc')
            ->groupby('id_product')->get();
    }
    public function getProductImg($id){
        return $this->select('products.id as id_product',DB::raw("GROUP_CONCAT(media_products.image) AS img"))
        ->join('media_products','media_products.id_product','=','products.id')
        ->where('products.id','=',$id)
        ->groupby('id_product')->first();
        }
    public function getAllCategories()
    {
        return $list = DB::table('Categories_product')
            ->where('status',0)
            ->orderBy('id', 'desc')
            ->get();

    }
    public function addProduct($value){
            return $this
            ->insertGetId($value);
    }


    public function ClientProductAll(){
        return  $this->select('products.id as id_product','products.name as nameproduct','compolation','content','describe','price','date_input','products.status as statusproduct',DB::raw("GROUP_CONCAT(categories_product.slug) AS slugcategory"))
        ->leftJoin('intermediary_products','products.id','=','intermediary_products.id_product')
        ->join('categories_product','intermediary_products.id_category','=','categories_product.id')
        ->where('products.status','=',0)
        ->orderBy('id_product','desc')
        ->groupby('id_product')->get();
    }
    
    public function productAll(){
        return  $this->select('products.id as id_product','products.name as nameproduct','compolation','content','describe','price','date_input','products.status as statusproduct',DB::raw("GROUP_CONCAT(categories_product.slug) AS slugcategory"))
        ->leftJoin('intermediary_products','products.id','=','intermediary_products.id_product')
        ->join('categories_product','intermediary_products.id_category','=','categories_product.id')
        ->where('products.status','=',0)
        ->orderBy('id_product','desc')
        ->groupby('id_product')->paginate(2);
    }
    
    public function productImg(){
    return $this->select('products.id as id_product',DB::raw("GROUP_CONCAT(media_products.image) AS img"))
    ->join('media_products','media_products.id_product','=','products.id')
    ->where('products.status','=',0)
    ->groupby('id_product')->get();
    }
    public function deleteProduct($id){
        return DB::table('products')->where('id','=',$id)->update(['status' => 1]);
    }
    public function editProduct($id,$value){
        return DB::table('products')->where('id','=',$id)->update($value);
    }

}
