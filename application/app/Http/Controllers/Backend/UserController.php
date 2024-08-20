<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use View;

class UserController extends Controller
{
    protected $pagePath = 'pages.backend.';

    public function index(){
        $userID = auth()->user()->id;
        $usersData = User::where('id','!=',$userID)->get();
        return view($this->pagePath.'users.index',compact('usersData'));
    }

    private function deleteFile($userId){
        $user = User::findOrFail($userId);
        $filePath = public_path($user->image);
        if($user->image){
            $ImagePath = public_path($user->image);
            if(file_exists($ImagePath)){
                unlink($ImagePath);
                return true;
            }else{
                return true;
            }
        }
    }
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
                if ($this->deleteFile($user->id) && $file->move($uploadPath, $fileName)) {
                    $user->image = "uploads/users/" . $fileName;
                    
                } else {
                    return redirect()->back()->with('error', 'Image upload failed');
                }
            }
            if($user->save()){
                return redirect()->back()->with('success', 'user account updated');
            }
            
        }
    }

    public function status(Request $request){
        $id = $request->userid;
        $user = User::findOrFail($id);
        if($user->role=='user'){
            $user->role='admin';
        }else{
            $user->role='user';
        }
        $user->save();
        return redirect()->back()->with('success','User status updated successfully');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        if($this->deleteFile($user->id) && $user->delete()){ //if i remove the code for deleting the file then only this function works
            return redirect()->back()->with('success','user deleted sucessfully');
        }else{
            return redirect()->back()->with('error','User delete failed');
        }
    }
}
