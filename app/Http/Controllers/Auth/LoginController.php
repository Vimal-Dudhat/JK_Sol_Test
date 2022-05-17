<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('user_name',$request->user_name)->where('password',$request->password)->first();
 
        if ($user) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        else
        {
            $msg = "Wrong Username or Password !";
            return view('login',compact('msg'));
        }
    }
}
