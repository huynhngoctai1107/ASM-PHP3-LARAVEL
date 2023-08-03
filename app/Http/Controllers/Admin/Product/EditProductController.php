<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intermediary_products;
use App\Models\MediaProducts;
use App\Models\Products;
use App\Http\Controllers\ValidateFromController;

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
    function viewEdit($id){


        $data= [
            'categoryProduct'=> $this->product->getAllCategories(),
            'page' =>'edit',
            'product' => $this->product->getProduct($id),
            'images'=>$this->product->getProductImg($id),

        ];
        return view('admin.page.addEdit.product',['data'=>$data]);
    }
    function editProduct($id,Request $request){


        $data= [
            'categoryProduct'=> $this->product->getAllCategories(),
            'page' =>'edit',
            'product' => $this->product->getProduct($id),
            'images'=>$this->product->getProductImg($id),

        ];
        if ($this->validate->validateFormEditProducts($request)->fails()) {
            return Redirect::to("/admin/edit-product/$id")->withErrors($this->validate->validateFormEditProducts($request))->withInput($request->input())->with(['data'=>$data]);
        }
        else{
            $dataProduct = array(
                "name" => $request->nameProduct,
                "content" => $request->content,
                "describe" => $request->describe,
                "price"=>$request->price,
                "date_input"=>$request->date_input,
                "compolation"=>auth()->user()->email,
            );


                    $this->product->editProduct($id,$dataProduct);
                    $this->intermediary_products->DeleteProduct($id);
                    $countCategory=count($request->category);
                    for($i=0; $i<$countCategory; $i ++ ){
                        $dataCategory = array(
                            "id_category" => $request->category[$i],
                            "id_product"=> $id,
                        );
                        $this->intermediary_products->AddCategoryProduct($dataCategory);
                    }
                    if(empty($request->uploadfile)){

                    }else{
                        $this->media->DeleteMediaProduct($id);
                        $countImg=count($request->uploadfile)  ;
                        for($i=0; $i<$countImg; $i ++ ){
                            $fileName = time().$i.'-'.'imgProduct'.'.'.$request->uploadfile[$i]->extension() ;
                            $request->uploadfile[$i]->move(public_path("img/products"), $fileName);
                            $request->merge(['image'=>$fileName]);
                            $dataCategory = array(
                                "image" => $request->image,
                                "id_product"=> $id,
                            );
                            $this->media->AddMediaProduct($dataCategory);
                        }
                    }


                    return redirect('/admin/list-products')->with('edit-product', "Chỉnh sửa sản phẩm thành công !");


//                    return redirect('/admin/list-products')->with('edit-error-product', "Chỉnh sửa sản phẩm thất bại !");






        }

    }

}
