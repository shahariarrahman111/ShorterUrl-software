<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function LoginForm (){

        return view('pages.login');
    }

    public function RegisterForm (){

        return view('pages.register');
    }

    public function Home (){

        return view('pages.home');
    }


    public function showUrlForm(){

        return view('pages.big-url');
    }

    

}
