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

        $user = Auth::user();
    
        // Blade view sending
        return view('pages.home', compact('user'));
    }


    public function showUrlForm(){

        return view('pages.big-url');
    }

    

}
