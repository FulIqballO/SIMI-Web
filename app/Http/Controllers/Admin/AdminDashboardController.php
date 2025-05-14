<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{

    
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->withErrors('Silakan login terlebih dahulu.');
        }

      
        $admin = Auth::guard('admin')->user();

        return view('admin.admin', compact('admin'));
    
    }

    // public function login(Request $request)
    // {
     
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:8',
    //     ]);
    
        
    //     $credentials = $request->only('email', 'password');
    
        
    //     if (Auth::guard('admin')->attempt($credentials)) {
            
    //         return redirect()->intended(route('/admin/dashboard'));
    //     }
    
        
    //     return redirect()->back()->withErrors(['email' => 'The provided credentials are incorrect.'])->withInput();
    // }
}
