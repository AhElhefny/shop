<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterUserController extends Controller
{
    public function register(UserRequest $request){
        $user=$request->except('ConfirmPassword');
        $user['image']=$request->file('image')->store('usersImages');
        Auth::login(User::create($user));
        return redirect('/');
    }





}
