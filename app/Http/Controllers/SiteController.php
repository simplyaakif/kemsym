<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $title = 'Subscriptions';
        return view('pages/subs')->with('title', $title);
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
        return view('pages/visitor')->with('title', $title);
    }
}
