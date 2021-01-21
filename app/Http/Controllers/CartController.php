<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\smartphone_specifications;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    
    
    public function index(){
        $cart = Cart::content();
        return view('cart.index', ['data' => $cart]);
    }

    public function addItem($id){

        $product = smartphone_specifications::find($id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => $product->weight]);
        return back();
    }
    public function removeItem($id){
       
        Cart::remove($id);
        return back();
    }

}
