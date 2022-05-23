<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginUserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(){
        $attr = request()->validate([
           'email' => ['required','email','min:5','max:255'],
           'password' => ['required','min:7','max:255'],
        ]);
        if(!auth()->attempt($attr)){
//            throw validationException::withMessages(['email'=>'your email or password or both are incorrect']);
            return  back()->with('email','the all is error');
        }
        session()->regenerate();
        return redirect('/');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
