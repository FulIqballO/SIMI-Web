<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_admin(){

          if (Auth::guard('admin')->check()) {
           return redirect()->route('admin'); 
        }

              return view('login_admin');

    }
    
    
    public function ceklogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

      
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
           
            return redirect()->route('admin');
        }

        return redirect()->back()->withInput()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request){
        
        Auth::guard('admin')->logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

    return redirect()->route('login_admin');
        
    }

    
    

}
