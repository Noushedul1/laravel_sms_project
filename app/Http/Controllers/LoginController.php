<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;
class LoginController extends Controller
{
    public $check;
    public $user;
    public function mesterLogin()
    {
        return view('Login.login');
    }
    public function newLogin(Request $request)
    {
       if($request->check == 1)
       {
           return $request->check;
        // $this->user = Teacher::where('email',$request->email)->where('status',1)->first();
        // if($this->user)
        // {
        //     if(password_verify($request->password, $this->user->password))
        //     {
        //         return "Valid Password";
        //     }
        //     else
        //     {
        //         return "Invalid Password";
        //     Session::put('user_id',$this->user->id);
        //     Session::put('user_name',$this->user->name);
        //     Session::put('user_image',$this->user->image);
        //     return redirect('/teacher-dashboard');
        //     }
        // }
       }
       else
       {
           return redirect()->back()->with("message","Email or Password Invalid");
       }
    }
    // public function logout()
    // {
    //     Session::forget('user_id');
    //     Session::forget('user_name');
    //     Session::forget('user_image');

    //     return redirect('/');
    // }
}
