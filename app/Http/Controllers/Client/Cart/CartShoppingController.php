<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartShoppingController extends Controller
{
    function shoppingCart(){
        return view('client.page.shoppingcart');
    }
}
