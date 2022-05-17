<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role',2)->get();
        return view('dashboard',compact('users'));
    }
    
    public function logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect('dashboard');
    }
}
