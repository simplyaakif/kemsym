<?php

namespace App\Http\Controllers;

use App\Products;
use App\Cart;
use Illuminate\Http\Request;
use Session;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function show(Products $products)
    {
        //
    }
    public function destroy(Products $products)
    {
        //
    }
    public function getAddToCart(Request $request, $id){
        $product = Products::find($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        return back();
    }
    public function getCart(){
        if(!Session::has('cart')){
            return view('pages.shopping-cart',['products'=>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart ($oldCart);
        $title = 'Shopping Cart';
        return view('pages.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'title'=>$title]);
    }
    
    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if(count($cart->items)>0 ){
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
            // dd(session()->get('cart'));
        }

        Session::put('cart',$cart);
        return back();
    }
}
