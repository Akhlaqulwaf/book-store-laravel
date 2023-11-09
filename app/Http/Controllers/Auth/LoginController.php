<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard');
            }
            else{
                return redirect('/');
            }
        }else{
            return redirect()->route('login')->withErrors('Email dan password tidak sesuai')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

