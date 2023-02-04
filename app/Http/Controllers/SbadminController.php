<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SbadminController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function contact()
    {
        return view('contact');
    }
}
