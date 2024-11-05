<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserDetailsRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('user.user-view');
    }
    public function logout(){
        auth()->logout();
        return redirect(route('login_view'));
    }
    public function change_password_view(){
        return view('user.change-password');
    }
    public function change_password(ChangePasswordRequest $request){
        if(Hash::check($request->current_password, auth()->user()->password)){
            auth()->user()->update([
                "password" => $request->new_password
            ]);
            return back();
        }
        return back()->with(['error' => 'Aktualne hasło jest niepoprawne!']);
    }
    public function details_create_view(){
        return view('user.details-create');
    }
    public function details_create(CreateUserDetailsRequest $request){
        UserDetail::updateOrCreate(
            ["user_id" => auth()->user()->id],
            [
                "name" => $request->name,
                "surname" => $request->surname,
                "age" => $request->age,
                "user_id" => auth()->user()->id
            ]
        );

        return redirect()->to(route('details_get_view'));
    }
    public function details_get_view(){
        $user_details = auth()->user()->user_details;
        return view('user.details-get', compact('user_details'));
    }
}
