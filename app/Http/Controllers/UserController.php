<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function getSignup(){
        return view('user.signup');
    }//end getSignup

    public function postSignup(Request $request){
        $this->validate($request, [
            'email'=>'email|required|unique:users',
            'password'=>'required|min:4'
        ]);
        $user =  \App\User::create([
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);
        $user->save();

        //when the user sign up this will automatically sign in
        Auth::login($user);

        return redirect()->route('maps.index');
    }//end postSignup

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email' =>$request->input('email'),
         'password' =>$request->input('password')])){
             return redirect()->route('maps.index');
         }
         return redirect()->back();
    }

     public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}


