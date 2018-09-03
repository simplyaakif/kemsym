<?php

namespace App\Http\Controllers;
use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(30);
        return UsersResource::collection($users);
    }
    public function show(User $user)
    {
        $user = Users::findOrFail($user->id);
        return new UsersResource($user);
    }
    public function store(Request $request)
    {
        $user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->verified = $request->input('verified');
        
        if($user->save()){
            return new UsersResource($user);
        }
    }
    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        if ($user->delete()){
            return new UsersResource($user);
        }
    }
    
}
