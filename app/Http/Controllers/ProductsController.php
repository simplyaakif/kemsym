<?php

namespace App\Http\Controllers;

use App\Products;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Resources\ProductsResource;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(30);
        return ProductsResource::collection($products);
    }

    public function store(Request $request)
    {
        $product = $request->isMethod('put') ? Products::findOrFail($request->id) : new Products;
        $product->id = $request->input('id');
        $product->product_name = $request->input('product_name');
        $product->product_web = $request->input('product_web');
        $product->product_email = $request->input('product_email');
        $product->product_message = $request->input('product_message');
        
        if($product->save()){
            return new ProductsResource($contact);
        }
    }
    public function show(Products $product)
    {
        $products = Products::findOrFail($product->id);
        return new ProductsResource($products);
    }
    public function destroy(Products $product)
    {
        $products = Contact::findOrFail($product->id);
        if ($products->delete()){
            return new ContactResource($products);
        }
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
        $title = 'Shopping Cart';
        if(!Session::has('cart')){
            return view('pages.shopping-cart',['products'=>null,'title'=>$title]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart ($oldCart);
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


    public function singleProduct($id){
        $product = Products::find($id);
        $title = $product->product_name;
        return view('pages.single')->with('product',$product)->with('title',$title);
    }




}
