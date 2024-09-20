<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm (Request $request){
         return view('auth.login');
    }
    
    public function login_request(Request $request)
    {
        // Validation rules for login form
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed',
            ]);
        }
    
        // Attempt to log the user in with provided credentials
        $credentials = $request->only('email', 'password'); 
    
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'redirect_url' => url('/dashboard'), // Example redirect to dashboard
            ]);
        } else {
            // Authentication failed
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ]);
        }
    }
     

     public function logout(Request $request)
     {
          Auth::logout(); // Logs out the user
           
          // Optionally invalidate and regenerate the session
          $request->session()->invalidate();
          $request->session()->regenerateToken();

          return redirect('/login');
     }

    
}
