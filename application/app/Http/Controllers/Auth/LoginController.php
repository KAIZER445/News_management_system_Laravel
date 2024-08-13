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
        if(auth()->attempt(['username'=>$username,'password'=>$password])){
            return redirect()->route('dashboard');
        }else{
            return back()->with('error', 'Invalid credentials');
        }
    }
}
