<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin/pages/index');
    }
    public function contact(){
        return view('admin/pages/contact');
    }
    public function users(){
        return view('admin/pages/users');
    }
    public function subscription(){
        return view('admin/pages/subscription');
    }
    public function profile(){
        return view('admin/pages/profile');
    }
}
