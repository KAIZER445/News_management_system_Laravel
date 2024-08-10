<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\user;

class LoginController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function store(Request $request){

        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $data['username'];
        $password = $data['password'];

        $user = User::where('username', $username)->first();
        if ($user && $user->password === $password) {
            auth()->login($user);
            return redirect()->route('welcome');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }
    
}
