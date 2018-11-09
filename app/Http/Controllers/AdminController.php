<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Orders;
use App\Subscriptions;
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
        $orders = count(
            Orders::all()
        );
        $subs = count(
            Subscriptions::all()
        );

        return view('admin/pages/index')
                    ->with('total_client_count',$total_client_count)
                    ->with('pending_client_count',$pending_client_count)
                    ->with('orders',$orders)
                    ->with('subs',$subs);

    }
    public function contact(){
        return view('admin/pages/contact');
    }
    public function users(){
        return view('admin/pages/users');
    }
    public function orders(){
        return view('admin/pages/orders');
    }
    public function subscriptions(){
        $usersubs = DB::table('subscriptions')
                    ->join('users','users.id','=','subscriptions.user_id')
                    ->select('subscriptions.paypal_billing_plan_id','subscriptions.id','subscriptions.created_at','users.name', 'users.email')
                    ->get();
        // $users = User::all();
        return view('admin/pages/subscriptions')
                ->with('usersubs',$usersubs);
                // ->with('users',$users);
    }
    public function profile(){
        return view('admin/pages/profile');
    }
    public function products(){
        return view('admin/pages/products');
    }
}
