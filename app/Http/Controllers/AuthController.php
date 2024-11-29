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


            // Check if an image is uploaded
            if ($request->hasFile('img')) {
            // Save the uploaded image
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename); // Save to public/images
            $imagePath =$filename; // Store image path in database


            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'img' => $imagePath,
                'password' => Hash::make($request->password)
            ]);

            // return response()->json(['message' => 'User registered successfully.'], 200);

            return redirect()->route('login.form')->with('success','User registered successfully.');
        }else{
            return response()->json(['message' => 'Image is required'], 400);
        }    

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


            // Checking has email and password stay in database
            if (!Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('register.form');
            }

            $user=User::where('email',$request->email)->firstOrFail();
            $token=$user->createToken('auth_token')->plainTextToken;
            //  Auth::login($user);

            // return response()->json(['message'=> 'Login successfully.','user' => $user ,'token'=> $token], 200);

            // return redirect()->route('home.page');
            
            return redirect()->route('home.page')->with('success', 'Login successfully');

        }catch (Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function UserLogout(Request $request)
    {
        // User request for logout
        $user = $request->user();

        //Delete all the user's tokens
        $user->tokens->each(function ($token) {
            $token->delete(); 
        });
    
        // Logout the user and clear the session
        Auth::guard('web')->logout();  // Use `guard('web')` for standard session logout
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success','User logout successfully.');
    }


    public function showProfile (){

         $user = Auth::user();

        return view('pages.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
        ]);

        // Update user data
        User::where('id', '=', Auth::id())->update([
            'name'=> $request->input('name'),
            'email'=> $request->input('email')
        ]);

        return redirect()->route('profile.view')->with('success', 'Profile updated successfully');
    }




}
