<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(Request $request){
        return view('login');
    }
    public function forget_password(Request $request){
        return view('forget_password');
    }

    public function register(Request $request){
        return view('register');
    }
    public function register_post(Request $request){
        // dd($request->all());
        // $user = request()->validate([
        //     'name' => 'required',
        //     'email' => 'required, 'unique:users',
        //     'password' => ['required', 'min:5', 'max:15'],

        // ]);
        $user = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:5', 'max:15'],
            'confirm_password' => ['required-with:password', 'same:password' , 'min:5']
        ],
    );
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Register successfully');
    }

    public function login_post(Request $request){
        // dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password] , true)){
            if(Auth::User()->is_role == 1){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect('/')->with('error', 'No HR Available....please check');
            }
        }else{
            return redirect()->back()->with('error', 'please enter the correct candidate');
        }
    }


}
