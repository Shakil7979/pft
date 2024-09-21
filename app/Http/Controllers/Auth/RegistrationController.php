<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function registerForomShow(Request $request ){
        return view('auth.register');
    } 
     

public function register_request(Request $request)
{
    // Step 1: Validate basic input
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
            'message' => "All fields are required!",
        ]);
    }

    // Step 2: Real-time email validation using NeverBounce API
    try {
        $client = new Client();
        $response = $client->request('GET', 'https://api.neverbounce.com/v4/single/check', [
            'query' => [
                'key' => env('NEVERBOUNCE_API_KEY'),
                'email' => $request->input('email'),
            ],
        ]);

        $email_data = json_decode($response->getBody()->getContents(), true);
        Log::info($email_data); // Log response for debugging

        // Check if the email is valid
        if (!isset($email_data['result']) || $email_data['result'] !== 'valid') {
            return response()->json([
                'status' => false,
                'message' => "The email provided is not valid or not deliverable!",
            ]);
        }

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => "Failed to verify email. Please try again.",
        ]);
    }

    // Step 3: Create the user if email is valid
    $user = User::create([
        'name' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    if ($user) {
        return response()->json([
            'status' => true,
            'message' => "Account created successfully!",
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => "Account creation failed!",
        ]);
    }
}

    

}
