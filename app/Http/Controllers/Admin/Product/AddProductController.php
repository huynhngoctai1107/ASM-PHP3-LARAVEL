<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intermediary_products;
use App\Models\MediaProducts;
use App\Models\Products;
use App\Http\Controllers\ValidateFromController;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class AddProductController extends Controller
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
    function viewProduct(){

        $data=[
            'categoryProduct'=> $this->product->getAllCategories(),
            'page' =>''

        ];

        return view('admin.page.addEdit.product',['data'=>$data]);
    }
    function addProduct(Request $request){

        $data=[
            'categoryProduct'=> $this->product->getAllCategories(),
            'page' =>''

        ];

        if ($this->validate->validateFormAddProducts($request)->fails()) {
            return Redirect::to('/admin/add-product')->withErrors($this->validate->validateFormAddProducts($request))->withInput($request->input())->with(['data'=>$data]);
        }else{



            $dataProduct = array(
                "name" => $request->name,
                "content" => $request->content,
                "describe" => $request->describe,
                "price"=>$request->price,
                "date_input"=>date('Y-m-d'),
                "slug"=>Str::slug($request->name),
                "compolation"=>auth()->user()->email,
            );
            $idProduct=  $this->product->addProduct($dataProduct);
            $countCategory=count($request->category)  ;

            $countImg=count($request->uploadfile)  ;

            for($i=0; $i<$countCategory; $i ++ ){
                $dataCategory = array(
                    "id_category" => $request->category[$i],
                    "id_product"=> $idProduct,
                );
                $this->intermediary_products->AddCategoryProduct($dataCategory);
            }

         
            for($i=0; $i<$countImg; $i ++ ){
                  $fileName = time().$i.'-'.'imgProduct'.'.'.$request->uploadfile[$i]->extension() ;
                  $request->uploadfile[$i]->move(public_path("img/products"), $fileName);
                //   $images =public_path('img/products/'.$fileName);
                //   $img = Image::make($images)->resize(400, 150, function($constraint) {
                //       $constraint->aspectRatio();
                //   });
                //   $img->save($images);
                  $request->merge(['image'=>$fileName]);
                $dataCategory = array(
                    "image" => $request->image,
                    "id_product"=> $idProduct,
                );
                $this->media->AddMediaProduct($dataCategory);
            }

            return redirect()->back()->with('add-product', "Thêm sản phẩm thành công !");

        }

    }
}
