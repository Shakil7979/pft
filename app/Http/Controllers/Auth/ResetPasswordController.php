<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Password; 
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    // Show the reset password form
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // Handle the password reset request
    public function reset(Request $request)
    {
        // Step 1: Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => "All fields are required!",
            ]);
        }

        // Step 2: Attempt to reset the password
        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        // Step 3: Return response based on the result
        if ($response === Password::PASSWORD_RESET) {
            return response()->json([
                'status' => true,
                'message' => 'Password has been reset successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "The email provided is not valid or deliverable!"
            ]);
        }
    }
}
