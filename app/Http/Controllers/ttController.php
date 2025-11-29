<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ttController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string' ,
            'email' => 'required|email' ,
            'password' => 'required' ,
        ]);
        $user = User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password) ,
        ]);

        Auth::login($user) ;
        return redirect()->intended('dashbord') ;
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email' , 
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate() ;
            return redirect()->intended('dashboard') ;
        }
        return back()->withErrors(['email'=> 'email or pass invalide']) ;
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
