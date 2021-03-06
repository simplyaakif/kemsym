<?php

namespace App\Http\Controllers;

use Auth;
use App\Products;
use App\Orders;
use App\Cart;
use Illuminate\Http\Request;
use App\ProductsPrice;
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
        $product_data = $request->json()->all(); 
        $prices = $product_data['price'];
        // dd($product_data['price']);

        $product = $request->isMethod('put') ? Products::findOrFail($request->id) : new Products;
        $product->id = $request->input('id');
        $product->product_name = $request->input('product_name');
        $product->product_subHeading = $request->input('product_subHeading');
        $product->product_description = $request->input('product_description');
        $product->img_path = $request->input('img_path');

        if($product->save()){
            
            foreach($prices as $price){
                
                $productprice = new ProductsPrice;
                $productprice->product_id = $product->id;
                $productprice->product_pricetype = $price['product_pricetype'];
                $productprice->product_price = $price['product_price'];
                $productprice->save();
            }
            return new ProductsResource($product);
        }
    }
    
    public function show(Products $product)
    {
        $products = Products::findOrFail($product->id);
        return new ProductsResource($products);
    }

    public function destroy(Products $product)
    {
        $products = Products::findOrFail($product->id);
        $productstype = ProductsPrice::where('product_id',$product->id)->get();

        foreach ($productstype as $producttype){
            $producttype->delete();
        }

        if ($products->delete()){
            return new ProductsResource($products);
        }
    }


    public function getMonthlyCheckout(Request $request, $id, $price_id){
        $title = 'Product';
        $product = Products::find($id);
        $price = ProductsPrice::find($price_id);
        // print_r($product);
        return view('pages.monthlycheckout')
                ->with('title',$title) 
                ->with('product',$product) 
                ->with('price',$price); 
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


    public function getAddToCarts(Request $request, $id, $price_id, $quantity){
        $product = Products::find($id);
        $price = ProductsPrice::find($price_id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $quantity = intval($quantity);

        $cart->addpro($product,$price->id,$price->product_price,$price->product_pricetype,$price_id,$quantity);
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
        // dd($cart);
        
        // $cartProducts = array_values($cart->items);

        $items = $cart->items;
        $cartProducts = array();
        
        foreach($items as $item) { 
            $its['qty'] = $item['qty']; 
            $its['price'] = $item['price']; 
            $its['singleprice'] = $item['singleprice']; 
            $its['pricetype'] = $item['pricetype']; 
            $its['product_prices_id'] = $item['product_prices_id']; 
            $its['pro'] = ProductsPrice::findOrFail($item['product_prices_id']);
            $its['item'] = Products::findOrFail($its['pro']['product_id']);
            array_push($cartProducts,$its);
        }

        // dd($cartProducts);

        // $cartProducts = $cart->items;
        // var_dump($cartProducts);

        // die();

        $prods = Products::all();

        return view('pages.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'title'=>$title,'vProducts'=>$cartProducts]);
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


    public function qtyUpdate($item_id,$qty){
        // $dd($qty);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateItem($item_id,$qty);
        
        if(count($cart->items)>0 ){
            Session::put('cart',$cart);
        }
        
        return 'Updated';
        // dd(session()->get('cart'));
   
    }


    public function singleProduct($id){
        $product = Products::find($id);
        $title = $product->product_name;
        return view('pages.single')->with('product',$product)->with('title',$title);
    }

    public function imgupload(Request $request)

    {
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
        // echo $input['imagename'];
        
        $destinationPath = public_path('/images');
        
        // echo $destinationPath.$input['imagename'];
        
        $image->move($destinationPath, $input['imagename']);
        
        // dd($destinationPath);

        return $input['imagename'];

    }

    public function checkout(){

        $title='Checkout';
        
        if(!Session::has('cart')){
            $title='Cart';
            return view('pages.shopping-cart',['products'=>null,'title'=>$title]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart ($oldCart);
        // dd($cart);

        // return $cart->items;
        // $cartProducts = json_encode($cart->items);
        // dd($cartProducts);
        return view('pages.checkout',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'title'=>$title]);

        
    }

    public function paymentApproved(){
        $title='Order Recieved';

        $oldCart = Session::get('cart');
        $cart = new Cart ($oldCart);

        $cartObjects = $cart->items;
        
        // dd($cart);
        
        foreach($cartObjects as $object){
            // echo $object['product_prices_id'];
            $order = new Orders;
            $order->user_id = Auth::user()->id;
            $order->products_prices_id = $object['product_prices_id'];
            $order->quantity = $object['qty'];
            $order->save();
        }



        Session::forget('cart');
        return view('pages.order',['title'=>$title]);

    }


}
