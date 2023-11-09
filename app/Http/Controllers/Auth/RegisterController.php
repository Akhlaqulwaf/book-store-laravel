<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('auth.register');
    }

    public function register(Request $request){

        $message = [
            'name.required' => "Nama wajib diisi",
            'phone.required' => 'Nomer handphone wajib diisi',
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi'
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'max:15', 'confirmed']
        ], $message);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => 'customer',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}
