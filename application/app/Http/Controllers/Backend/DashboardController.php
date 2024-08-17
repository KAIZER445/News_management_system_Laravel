<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $pagePath = 'pages.backend.';
    public function index(){
        return view($this->pagePath.'dashboard');
        
    }

}
