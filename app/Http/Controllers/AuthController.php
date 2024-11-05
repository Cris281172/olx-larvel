<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserLogged;
use App\Mail\ExampleMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register_view(){
        return view('auth.register');
    }
    public function register(AuthRegisterRequest $request){
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);
        return redirect()->to('/auth/login');
    }
    public function login_view(){
        return view('auth.login');
    }
    public function login(AuthLoginRequest $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//            Mail::to('krzysztofjuczynski@gmail.com')->send(new ExampleMail(Auth::user()));
            Auth::user()->notify(new UserLogged(Auth::user()));
            return redirect()->to('/user');
        }
        return back();
    }
}
