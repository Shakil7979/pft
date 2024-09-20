<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function ForgotForomShow(Request $request)
     {  
        return view('auth.forgot');
     } 
 
     public function forgot_request(Request $request)
    {
        // Step 1: Validate the email input  
        $validator = Validator::make($request->all(), [
            'forgot_password_email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => "Fields are required!",
            ]);
        }

        $email = $request->input('forgot_password_email');
        
        // Log the email being processed
        Log::info("Attempting to send password reset link to: " . $email);

        // Step 2: Check if the email exists and send reset link
        $status = Password::sendResetLink(['email' => $email]);

        // Step 3: Return a custom JSON response with 'status' and 'message'
        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => "Password reset link has been sent successfully to your email."
            ], 200);
        } else {
            // Log the error status
            Log::error("Failed to send password reset link for: " . $email . " Status: " . $status);

            return response()->json([
                'status' => false,
                'message' => "Failed to verify email. Please try again."
            ], 400);
        }
    }   

     
     
}
