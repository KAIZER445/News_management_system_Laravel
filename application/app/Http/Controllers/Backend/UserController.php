<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class UserController extends Controller
{
    protected $pagePath = 'pages.backend.';
    public function account(Request $request){
        if($request->isMethod('get')){
            // $user = auth()->user();
            // return view($this->pagePath.'users.account',compact('username'));
            return view($this->pagePath.'users.account');
        }else{
            $user = auth()->user();
            $user->username = $request->username;
            $user->gender = $request->gender;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $fileName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/users/');
                if ($file->move($uploadPath, $fileName)) {
                    $user->image = "uploads/users/" . $fileName;
                    return redirect()->back()->with('success', 'Image upload failed');
                } else {
                    return redirect()->back()->with('error', 'Image upload failed');
                }
            }
            $user->save();
        }
    }
}
