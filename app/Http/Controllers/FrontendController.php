<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view("home");
    }
    public function signin()
    {
        return view("signin");
    }
    public function signup()
    {
        return view("signup");
    }

}//
