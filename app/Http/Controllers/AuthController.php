<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.sign_up');
    }

    public function sign_up(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Generate a 6-digit verification code
        $verificationCode = random_int(100000, 999999);

        // Create the user
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode,
            'verification_expires_at' => Carbon::now()->addMinutes(10), // Code valid for 10 minutes
        ]);

        // Send the verification email
        Mail::to($user->email)->send(new \App\Mail\EmailVerification($verificationCode));

        // Redirect after successful registration
        return redirect()->route('verification.notice')->with('success', 'Registration successful. Please verify your email.');
    }

    public function verificationNotice()
    {
        return view('auth.thank_you');
    }

    public function verifyCode(Request $request)
{
    // Validate the input to ensure it's a 6-digit code
    $request->validate([
        'code' => 'required|digits:6',
    ]);

    // Attempt to find the user by the provided verification code
    $user = User::where('verification_code', $request->code)->first();

    // If user with the code exists, proceed with further checks
    if ($user) {
        // Check if the verification code has expired
        if (Carbon::now()->greaterThan($user->verification_expires_at)) {
            // Generate a new verification code and set the new expiration time
            $newVerificationCode = rand(100000, 999999);
            $newExpirationTime = Carbon::now()->addMinutes(10); // Set a new expiration time, e.g., 10 minutes

            // Update the verification code, expiration time, and set is_verified to 0 (not verified)
            $user->update([
                'verification_code' => $newVerificationCode,
                'verification_expires_at' => $newExpirationTime,
                'is_verified' => 0,  // Ensure the user is marked as not verified if the code has expired
            ]);

            // Send an email with the new verification code (optional, if required)
            // Mail::to($user->email)->send(new EmailVerification($newVerificationCode));

            return redirect()->back()->with('error', 'Verification code has expired. A new code has been sent. Please check your email.');
        }

        // If the code is valid and not expired, verify the user
        $user->update([
            'is_verified' => 1,
        ]);

        return redirect()->route('auth.login')->with('success', 'Email verified successfully. You can now log in.');
    }

    // Handle invalid verification code
    return redirect()->back()->with('error', 'Invalid verification code. Please use the correct one.');
}



    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('characters'); // Redirect to 'welcome' if already logged in
        }
    
        return view('auth.login'); // Show login form if not logged in
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if email exists in the database
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // If email does not exist, show a specific error message
            return redirect()->route('login')->withErrors([
                'email' => 'A valid user account is required to see the landing page.'
            ]);
        }

        // Check if the password is correct
        if (!Hash::check($request->password, $user->password)) {
            // If password is incorrect, show a specific error message
            return redirect()->route('login')->withErrors([
                'password' => 'The password you entered is incorrect.'
            ]);
        }

        // Attempt to log the user in
        Auth::login($user);

        // Redirect to the landing page after successful login
        return redirect()->route('characters');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login.form'); // Redirect to login after logout
    }
}
