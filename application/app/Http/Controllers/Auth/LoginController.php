<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\user;

class LoginController extends Controller
{
    
    protected $pagePath = 'pages.backend.';
    public function login(){
                if(auth()->check()){
            return redirect()->route('dashboard');
        }else{
            return view($this->pagePath.'login');
        }
        
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

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
