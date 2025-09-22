<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('credenciamento/login');
    }

    public function loginAttempt(Request $request){

    $request->validate([
        'email' => 'required|email',
        'senha' => 'required|string',
    ]);

    // mapeia 'senha' para 'password'
    $credentials = [
        'email' => $request->email,
        'password' => $request->senha,
    ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withInput()->with('status', 'Credenciais inválidas!');

}

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}

