<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intermediary_products;
use App\Models\MediaProducts;
use App\Models\Products;
use App\Http\Controllers\ValidateFromController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class EditProductController extends Controller
{

    public $validate;
    public $product;
    public $media;
    public $intermediary_products;
    public function  __construct(){
        $this->validate = new ValidateFromController();
        $this->product = new Products();
        $this->media = new MediaProducts();
        $this->intermediary_products = new Intermediary_products();
    }
    function viewEdit($slug){

        $condition=[
            'products.slug' => $slug, 
            'products.status'=>0 ,

        ];
        $data= [
            'categoryProduct'=> $this->product->getAllCategories(),
            'page' =>'edit',
            'product' => $this->product->getProduct($condition),
            'images'=>$this->product->getProductImg( $condition),

        ];
        return view('admin.page.addEdit.product',['data'=>$data]);
    }
    function editProduct($slug,Request $request){

        $condition=[
            'products.slug' => $slug, 
            'products.status'=>0 ,

        ];
        $data= [
            'categoryProduct'=> $this->product->getAllCategories(),
            'page' =>'edit',
            'product' => $this->product->getProduct($condition),
            'images'=>$this->product->getProductImg( $condition),

        ];
        if ($this->validate->validateFormEditProducts($request)->fails()) {
            return Redirect()->back()->withErrors($this->validate->validateFormEditProducts($request))->withInput($request->input())->with(['data'=>$data]);
        }
        else{
            $dataProduct = array(
                "name" => $request->name,
                "content" => $request->content,
                "describe" => $request->describe,
                "slug"=>Str::slug($request->name),
                "price"=>$request->price,
                "date_input"=>$request->date_input,
                "compolation"=>auth()->user()->email,
            );
            $condition = [
                'slug' =>$slug
            ];
            

                    $this->product->editProduct($condition,$dataProduct);
                    $this->intermediary_products->DeleteProduct( $request->id);
                    $countCategory=count($request->category);
                    for($i=0; $i<$countCategory; $i ++ ){
                        $dataCategory = array(
                            "id_category" => $request->category[$i],
                            "id_product"=>  $request->id,
                        );
                        $this->intermediary_products->AddCategoryProduct($dataCategory);
                    }
                    if(empty($request->uploadfile)){

                    }else{
                        $this->media->DeleteMediaProduct($request->id);
                        $countImg=count($request->uploadfile)  ;
                        for($i=0; $i<$countImg; $i ++ ){
                            $fileName = time().$i.'-'.'imgProduct'.'.'.$request->uploadfile[$i]->extension() ;
                            $request->uploadfile[$i]->move(public_path("img/products"), $fileName);
                            $request->merge(['image'=>$fileName]);
                            $dataCategory = array(
                                "image" => $request->image,
                                "id_product"=>$request->id,
                            );
                            $this->media->AddMediaProduct($dataCategory);
                        }
                    }


                    return redirect('/admin/list-products')->with('edit-product', "Chỉnh sửa sản phẩm thành công !");


//                    return redirect('/admin/list-products')->with('edit-error-product', "Chỉnh sửa sản phẩm thất bại !");






        }

    }

}
