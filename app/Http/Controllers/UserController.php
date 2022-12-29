<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }
    public function postSignup(Request $request){

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' =>'required|min:4',
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);

        return redirect()->route('post.enteringGame');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        if(Auth::attempt(['email' => $request -> input('email'), 'password' => $request -> input('password')])){
            return redirect() -> route('post.enteringGame');
        }
        return redirect() -> back();
    }

    public function getLogout(){
        Auth::logout();
        return redirect() -> back();
    }
}
