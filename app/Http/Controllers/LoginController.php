<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }
    
    public function login(Request $request){
    
        $credentials = $request->validate([
            'password' => ['required'],
        ]);
     
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
     
            return redirect()->intended('dashboard');
        }
     
        return back()->withErrors([
            'password' => 'Password tidak cocok.',
        ]);
    }
}
