<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ViewController;
use App\Http\Controllers\Admin\ViewController as ViewAdminController;
//resignter
use App\Http\Controllers\ResignterController;
// login
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FaceBookLoginController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\GithubLoginController;
use App\Http\Controllers\ResetPasswordController;
// admin users
use App\Http\Controllers\Admin\Users\DelectUserController;
use App\Http\Controllers\Admin\Users\AddUserController;
use App\Http\Controllers\Admin\Users\ListsUserController;
use App\Http\Controllers\Admin\Users\EditUserController;
// admin products
use App\Http\Controllers\Admin\Product\AddProductController;
use App\Http\Controllers\Admin\Product\ListProductController;
use App\Http\Controllers\Admin\Product\EditProductController;
use App\Http\Controllers\Admin\Product\DeleteProductController;
// admin Category posts
use App\Http\Controllers\Admin\CategoryPosts\AddCategoryController;
use App\Http\Controllers\Admin\CategoryPosts\ListCategoryController;
use App\Http\Controllers\Admin\CategoryPosts\EditCategoryController;
use App\Http\Controllers\Admin\CategoryPosts\DeleteCategoryController;
// admin Categogy products
use App\Http\Controllers\Admin\CategoryProducts\AddCategoryController as AddCategoryProductController;
use App\Http\Controllers\Admin\CategoryProducts\ListCategoryController as ListCategoryProductController;
use App\Http\Controllers\Admin\CategoryProducts\EditCategoryController as EditCategoryProductController;
use App\Http\Controllers\Admin\CategoryProducts\DeleteCategoryController as DeleteCategoryProductController;
// admin posts
use App\Http\Controllers\Admin\Posts\AddPostController;
use App\Http\Controllers\Admin\Posts\DeletePostController;
use App\Http\Controllers\Admin\Posts\EditPostController;
use App\Http\Controllers\Admin\Posts\ListPostController;
use App\Http\Controllers\Admin\Order\EditOrderController;
// admin oder 
use App\Http\Controllers\Admin\Order\ListOrderController;
use App\Http\Controllers\Admin\Order\DetailOrderController;
use App\Http\Controllers\Admin\Order\DeleteOrderController;
//client product
use App\Http\Controllers\Client\Categories\ProductController;
use App\Http\Controllers\Client\Products\DetailProductController;
// client post
use App\Http\Controllers\Client\Categories\PostController;
use App\Http\Controllers\Client\Posts\DetailPostController;
// shopping cart
use App\Http\Controllers\Client\Cart\AddCartController;
use App\Http\Controllers\Client\Cart\ViewCartController;
use App\Http\Controllers\Client\Cart\PayCartController;
use App\Http\Controllers\Client\Cart\DeleteCartController;
use App\Http\Controllers\Client\Pay\PaymentConfirmationController;
use App\Http\Controllers\Client\Pay\PayOderController;
//oder
use App\Http\Controllers\Client\Order\ViewOderAcoutController;
use App\Http\Controllers\Client\Order\DeleteOderController;
use App\Http\Controllers\Client\Order\DetailOderController;
 // error
use App\Http\Controllers\ErrorController;
// 
use App\Http\Controllers\Client\Products\ViewProductController;
// post 
use App\Http\Controllers\Client\Pay\StatusPaypalController;
use App\Http\Controllers\Client\Posts\ViewPostController;
//pdf 
 
use App\Http\Controllers\Pdf\OrderPdfController;

Route::group(['middleware'=>'clientAcout'],function(){
    Route::get('/acout',[ ViewOderAcoutController::class,'oderAcout']);
    Route::get('/shopping-cart', [ViewCartController::class,'shoppingCart']);

    Route::prefix('add-cart')->group(function () {
        Route::get('/{slug}',[AddCartController::class,'addCart']);
        Route::post('/{slug}',[AddCartController::class,'addCart']);
    });
    Route::prefix('pay')->group(function () {
        Route::post('/{id}/{token}',[PayOderController::class,'payCart']);
        Route::get('/{id}/{token}',[PayOderController::class,'error']);
    });

    Route::get('/delete-cart/{id}',[DeleteCartController::class,'deleteCart']);
    Route::get('/payment-confirmation/{id}/{token}',[ PaymentConfirmationController::class,'paymentConfirmation']);
    Route::get('/paypal',[ StatusPaypalController::class,'sussess'])->name('paypal_success');
    Route::get('/paypal-cancel',[ StatusPaypalController::class,'cancel'])->name('paypal_canel');
    Route::get('/momo',[ StatusPaypalController::class,'momosussess'])->name('momo_success');
     Route::get('/delete-order/{id_user}/{id_order}',[DeleteOderController::class,'deleteOder']);
    Route::get('/detail-order/{id_user}/{id_order}',[DetailOderController::class,'detailOder']);
    Route::get('/download-order-pdf/{id_user}/{id_order}',[OrderPdfController::class,'downloadPdf']);

});


Route::group(['prefix' => 'admin','middleware'=>['adminLogin']],function(){
   Route::get('/',[ ViewAdminController::class,'index']);
// level user
        Route::group(['middleware'=>['level']],function(){
            Route::get('/add-user',[ AddUserController::class,'viewUser']);
            Route::get('/edit-user/{id}',[ EditUserController::class,'viewEdit']);
            Route::post('/edit-user/{id}',[ EditUserController::class,'editUser']);
            Route::post('/add-user',[ AddUserController::class,'addUser']);
            Route::get('/delete-user/{id}',[ DelectUserController::class,'deleteUser']);

            // oder 
            Route::get('/edit-order/{id}',[ EditOrderController::class,'viewOrder']);
            Route::get('/delete-order/{id}',[ DeleteOrderController::class,'deleteOder']);
            Route::post('/edit-order/{id}',[EditOrderController::class,'editOrder']);


        });
            Route::get('/add-category-post',[ AddCategoryController::class,'viewCategory']);
            Route::get('/add-category-product',[ AddCategoryProductController::class,'viewCategory']);
            Route::get('/add-product',[ AddProductController::class,'viewProduct']);

            Route::get('/add-post',[ AddPostController::class,'viewPost']);
            Route::get('/edit-category-post/{slug}',[ EditCategoryController::class,'viewCategoryPost']);
            Route::get('/edit-category-product/{slug}',[ EditCategoryProductController::class,'viewCategoryProduct']);

            Route::get('/edit-product/{slug}',[ EditProductController::class,'viewEdit']);
            Route::get('/edit-post/{slug}',[ EditPostController::class,'viewEdit']);
            //edit form method post

            Route::post('/edit-category-post/{slug}',[ EditCategoryController::class,'editCategoryPost']);
            Route::post('/edit-category-product/{slug}',[ EditCategoryProductController::class,'editCategoryProduct']);
            Route::post('/edit-product/{slug}',[ EditProductController::class,'editProduct']);
            Route::post('/edit-post/{slug}',[ EditPostController::class,'editPost']);

            
            // add method post
            Route::post('/add-category-post',[ AddCategoryController::class,'addCategory']);
            Route::post('/add-category-product',[ AddCategoryProductController::class,'addCategory']);
            Route::post('/add-post',[ AddCategoryController::class,'addProduct']);
            Route::post('/add-product',[ AddProductController::class,'addProduct']);
            Route::post('/add-post',[ AddPostController::class,'addPost']);
            // delect
            Route::get('/delete-category-post/{slug}',[ DeleteCategoryController::class,'deleteCategoryPost']);
            Route::get('/delete-category-product/{slug}',[ DeleteCategoryProductController::class,'deleteCategoryProduct']);
            Route::get('/delete-product/{slug}',[ DeleteProductController::class,'deleteProduct']);
            Route::get('/delete-post/{slug}',[ DeletePostController::class,'deletePost']);
            
            
            
           //list
           Route::get('/list-categories-post',[ ListCategoryController::class,'listCategoryPost']);
           Route::get('/list-categories-product',[ ListCategoryProductController::class,'listCategoryProducts']);
           Route::get('/list-posts',[ ListPostController::class,'listPosts']);
           Route::get('/list-products',[ ListProductController::class,'listProducts']);
           Route::get('/list-users',[ ListsUserController::class,'listUsers']);
           Route::get('/list-oders',[ ListOrderController::class,'listOrder']);
           Route::get('/chi-tiet-hoa-don/{id}',[ DetailOrderController::class,'detailOrder']);
           //edit form method get


});


Route::group(['middleware'=>'checkLogin'],function(){
    Route::get('/login', [LoginController::class,'loginView'] );
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/privacy-policy',[FaceBookLoginController::class,'check']);
    Route::get('/facebook/callback',[FaceBookLoginController::class,'callbackFromFacebook']);
    Route::get('/facebook',[FaceBookLoginController::class,'loginUsingFacebook']);

    Route::group(['middleware'=>'spam'],function(){
    Route::get('/google',[GoogleLoginController::class,'loginUsingGoogle']);
    Route::get('/google/callback',[GoogleLoginController::class,'callbackFromGoogle']);
    Route::get('/github', [GithubLoginController::class, 'gitRedirect']);
    Route::get('/github/callback', [GithubLoginController::class, 'gitCallback']);

    });

    // login fb

    Route::get('/active-now/{token}/{id}', [ResignterController::class,'active'] );
    //view post client
    Route::get('/resignter', [ResignterController::class,'resignterView'] );

    Route::post('/resignter', [ResignterController::class,'resignter'] );
    Route::get('/forget-password',[ResetPasswordController::class,'viewreset']);
    Route::post('/forget-password',[ResetPasswordController::class,'checkEmail']);
    Route::get('/reset-password/{token}/{id}', [ResetPasswordController::class,'fromPassword'] );
    Route::post('/reset-password/{id}', [ResetPasswordController::class,'resetPassword'] );

});

    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('/',[ViewController::class,'index']);
    Route::get('/index', [ViewController::class,'index']);


    Route::get('/contact', [ViewController::class,'lienhe']);
    Route::get('/product',  [ViewProductController::class,'product']);
    Route::get('/about', [ViewController::class,'about']);
    Route::get('/blog',  [ViewPostController::class,'blog']);
    Route::get('/feature', [ViewController::class,'feature']);
    Route::get('/testimonial',  [ViewController::class,'testimonial']);
    Route::get('/404', [ErrorController::class,'fix']);
    Route::get('/successlogin',[LoginController::class,'successlogin']);
    Route::get('/product/danh-muc/{slug}',[ProductController::class,'getProduct']);
    Route::get('/blog/danh-muc/{slug}',[PostController::class,'getPost']);
    // RESET PASSWORD

    //detail
    Route::get('/xem-chi-tiet-san-pham/{slug}',[DetailProductController::class,'detailProduct']);
    Route::get('/chi-tiet-bai-viet/{slug}',[DetailPostController::class,'detailPost']);



