<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function UserRegister(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'img' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'password' => 'required|string|min:6|confirmed'
            ]);

            if ($request->hasfile('img') && $request->file('img')->isValid()){
                $path = $request->file('img')->store('images', 'public');
            }else{

                return response()->json(['message' => 'Image is required sha.'], 400);
            }


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'img' => $path,
                'password' => Hash::make($request->password)
            ]);


            // return response()->json(['message' => 'User registered successfully.'], 200);

            return redirect()->route('login.form');

        }catch (Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }


    }


    public  function UserLogin(Request $request){
        try{

            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'These credentials do not match our records.'], 404);
            }

//            Api Token create

            $token = $user->createToken('authToken')->plainTextToken;
            // Auth::login($user);

            // return response()->json(['message'=> 'Login successfully.','user' => $user ,'token'=> $token], 200);

            // return redirect()->route('home.page');
            return redirect('/home');

        }catch (Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function UserLogout(Request $request){

        $request->user()->tokens()->delete();

        return response()->json(['message' => 'User successfully logged out.'], 200);

    }


}
