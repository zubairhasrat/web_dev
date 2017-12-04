<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\UserRequest;
class Custom_Login extends Controller
{
        //protected $redirectTo = '/';

        public function __construct()
        {
           //$this->middleware('auth'); 
        }
        public function index(){
            return view('index');
        }
        public function login(){
            return view('/login');
        }
        public function register(){
            return view('/register');
        }
        public function authenticateUser(){

            $email = Input::get('email');
            $password = Input::get('password');
            
            if(!Auth::check()){
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    // Authentication passed...
                  return redirect('/home');
                }
            }
                return redirect()->back()->withInput();

        }
    public function register_user(Request $request){
        // dd($req->all());
        // $this->validate($request->all());
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User;
        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        return redirect('/login');
    }
    public function logout_user(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
