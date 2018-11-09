<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Products;
use App\ProductsPrice;
use App\Orders;
class SiteController extends Controller
{
    //
    public function index(){
        
    }

    public function goals(){
        $title = 'Goals';
        return view('pages/goals')->with('title', $title);
    }
    public function mission(){
        $title = 'Mission';
        return view('pages/mission')->with('title', $title);
    }
    public function vision(){
        $title = 'Vision';
        return view('pages/vision')->with('title', $title);
    }
    public function contact(){
        $title = 'Contact Us';
        return view('pages/contact')->with('title', $title);
    }
    public function subs(){
        $products = Products::all();
        

        $title = 'Subscriptions';
        return view('pages/subs')->with('title', $title)->with('products',$products);
    }
    public function statement(){
        $title = 'Bold Statement';
        return view('pages/statement')->with('title', $title);
    }
    public function pending(){
        $title = 'Registration Inactive';
        return view('pages/pending')->with('title', $title);
    }
    public function visitor(){
        $title = 'Dashboard';
        $user = Auth::user();
        $userProducts = Orders::where('user_id', $user->id)
                        ->get();

        // printf($userProducts);
        // $productOrderData = array(
        //     'productName' => , 
        // );

        return view('pages/visitor')->with('title', $title);
    }
    public function pStructure(){
        $title = 'Pricing Structure';
        return view('pages/pricingStructure')->with('title', $title);
    }
}
