<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $check;
    private $user;
    public function newLogin(Request $request)
    {
        // $pass = '321';
        // return bcrypt($pass); all the time change
        // return md5($pass); not change
        // return $request->all();
        if($request->check == 1) 
        {
            // echo $request->status;
            // return $request->status;
            $this->user = Teacher::where('email',$request->email)->where('status',1)->first();
            // return $this->user;
            if($this->user)
            {
                // password_verify is a php build in function (use hashing algo)
                if(password_verify($request->password,$this->user->password))
                {
                    echo "Password is valid";
                    exit();
                }
                else
                {
                    echo "Password is not valid";
                    exit();
                }
            }
        }
        else
        {
            echo "shotainne gorojjena?";
        }
    }
}
