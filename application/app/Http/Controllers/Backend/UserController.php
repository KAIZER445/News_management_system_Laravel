<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class UserController extends Controller
{
    protected $pagePath = 'pages.backend.';
    public function account(Request $request){
        return view($this->pagePath.'users.account');
    }
}
