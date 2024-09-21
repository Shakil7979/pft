<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        try {
            // Step 2: Attempt to send the reset link
            $status = Password::sendResetLink(['email' => $email]);

            if ($status === Password::RESET_LINK_SENT) {
                return response()->json([
                    'status' => true,
                    'message' => "Password reset link has been sent successfully to your email."
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Email is wrong. Please try again."
                ]);
            }
        } catch (\Exception $e) {
            // Log detailed error message
            Log::error('Error sending password reset link: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'An error occurred while sending the password reset link. Please try again later.',
            ]);
        }
    }

     
     

     
     
}
