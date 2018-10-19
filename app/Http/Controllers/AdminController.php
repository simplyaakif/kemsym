<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // $users = User::all();
        $total_client_count = count(
            User::where('role','visitor')->get()
        );
        $pending_client_count = count(
            User::where('verified','0')->get()
        );
        return view('admin/pages/index')
                    ->with('total_client_count',$total_client_count)
                    ->with('pending_client_count',$pending_client_count);

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
    public function products(){
        return view('admin/pages/products');
    }
}
