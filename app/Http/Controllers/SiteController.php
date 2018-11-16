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


    public function consulting(){
        $title = 'Consulting';
        $content = 'Kemmet Systems will help companies to solve their strategic and long range planning issues and problems.        The company will focus mostly in information Technology, Project management and Business analysis.';
        return view('products/product')->with('title', $title)->with('content',$content);
    }
    public function company_screening(){
        $title = 'Company screening';
        $content = 'Kemmet Systems will use governmental agencies and public records and information to screen companies to authenticate them for our clients.';
        return view('products/product')->with('title', $title)->with('content',$content);
    }
    public function applicants_employees(){
        $title = 'Screening of applicants and employees';
        $content = 'Kemmet Systems will use quizzes and surveys to verify and validate applicants and employees readiness and suitability for job roles and employment for our clients.';
        return view('products/product')->with('title', $title)->with('content',$content);
    }
    public function verifciation_validation(){
        $title = 'Identity and records Verification, Validation & Authentication';
        $content = 'Kemmet Systems will verify, validate and authenticate individuals identities and records for our clients.';
        return view('products/product')->with('title', $title)->with('content',$content);
    }
    public function document_authentication(){
        $title = 'Document and record authentication';
        $content = 'Kemmet Systems will use governmental business registration information and records to validate companies for our clients.';
        return view('products/product')->with('title', $title)->with('content',$content);
    }
    public function credit_rating(){
        $title = 'Credit Rating, Credit Score & Credit worthiness';
        $content = 'Kemmet Systems will store individuals and companies information to authenticate that they are making regular payments on their loans and Credit cards on time and are meeting their Financial obligations. The company will also analyze and update the complete portfolio for this individuals credit score and rating at the end of every month.';
        return view('products/product')->with('title', $title)->with('content',$content);
    }


}
