<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    
    // Google Login
    // Redirect to Google
    public function redirectToGoogle()
    {  
        return Socialite::driver('google')->redirect();
    }

    // Handle Google Callback
    public function handleGoogleCallback()
    { 
        try {
            // Retrieve the user information from Google
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists or create a new user
            $user = $this->findOrCreateUser($googleUser, 'google');

            // Log in the user
            Auth::login($user);

            // Redirect to the intended page or home
            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            // If any error occurs, redirect to the registration page with an error message
            return redirect('/register')->withErrors(['msg' => 'Google login failed.']);
        }
    }

    // Find or create the user based on Google user data
    private function findOrCreateUser($googleUser, $provider)
    {
        // Check if the user exists in the database
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // If the user does not exist, create a new one
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'provider_id' => $googleUser->getId(),
                'provider' => $provider,
                'password' => Hash::make(uniqid()) // Set a random password
            ]);
        }

        return $user;
    }

    // Facebook Login
    // Redirect to Facebook for authentication
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Handle the callback from Facebook
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $user = $this->findOrCreateFacebookUser($facebookUser);
            Auth::login($user);
            return redirect()->intended('/home');
        } catch (\Exception $e) {
            return redirect('/register')->withErrors(['msg' => 'Facebook login failed.']);
        }
    }

    // Find or create a user in the database
    protected function findOrCreateFacebookUser($providerUser)
    {
        // Check if the user already exists
        $user = User::where('email', $providerUser->getEmail())->first();

        // If the user does not exist, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'password' => bcrypt(uniqid()), // Generate a random password
            ]);
        }

        return $user;
    }
     
    
    

}
