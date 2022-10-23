<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function CHpassword(){
        return view('layouts.body.Changepass');
    }
 
    public function updatepass(Request $request){
$vildateDate=$request->validate([
'oldpassword'=>'required',
'password'=>'required|confirmed'
]);
$hashpassword=Auth::user()->password;
if(Hash::check($request->oldpassword,$hashpassword)){
    $user=User::find(Auth::id());
    $user->password=Hash::make($request->password);
    $user->save();
    Auth::logout();
    return redirect()->route('login')->with('success','password is change sucessfully');
}else{
    return redirect()->back->with('error','current password is invalid');
}
    }



    public function ProfUpdate(){
        if(Auth::user()){
            $user=User::find(Auth::id());
            if($user) {
                return view('layouts.body.update_profile',compact('user'));
            }
        }
    }



    public function UserUpdate(Request $request){
        $user=User::find(Auth::user()->id);
        if($user) {
            $user->name=$request['name'];
            $user->email=$request['email'];
            $user->save();
            return redirect()->back()->with('success',' profile is update sucessfully');
        }

else{
    return redirect()->back();
}
    }
}
