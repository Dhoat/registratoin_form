<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FormController extends Controller
{
    public function index()
    {
        return view('registration-form');   
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|max:250',
            'email'      => 'required|email|max:200',
            'password'   => 'required|min:6',
            'c_password' => 'required|same:password|min:6',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username'   => 'required|unique:users|max:50',
        ]);

        $image_name = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $image_name);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->profile = public_path('images').'.'.$image_name;
        $user->username = $request->username;
        $user->save();

        return redirect('add-registration-form')->with('status', 'Record Saved Successfully');
    }

    public function login()
    {
        return view('login-form');   
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email'       => 'required|max:250',
            'password'    => 'required|min:6',
        ]);

        $count = User::where('email', $request->email)
            ->where('password', $request->password)
            ->count();

        if(empty($count))
        {
            return redirect('login-form')->with('error', 'Email or password does not match.');
        }
         return redirect('login-form')->with('status', 'Login Successfully');

    }
}
