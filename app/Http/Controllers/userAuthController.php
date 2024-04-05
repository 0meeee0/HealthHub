<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
    
    public function registerUser(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'cPassword'=>'required',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return redirect('login')->with('success', 'You have created your account please login');
        }else{
            return back()->with('error', 'Something went wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('home');
            }else{
                dd('baghi t9awlbni al3friiiit');
            }
        }else{
            dd('la la makaynsh');
        }
    }
    public function home(){
        return view('home');
    }

    public function logout(){
        $data = array();
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
