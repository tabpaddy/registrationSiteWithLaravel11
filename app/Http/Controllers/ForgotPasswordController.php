<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendNewOtpMailJob;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //
    public function showForgotPasswordForm(){
        return view('auth.forgot-password');
    }

    public function sendOTP(Request $request){
        //validate request
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        //get otp
        $otp = rand(100000, 999999);

        //create otp table data
        $OTP = Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'created_at' => Carbon::now(),
        ]);

        // mail
        dispatch(new SendNewOtpMailJob(['email' => $OTP->email, 'otp' => $OTP->otp]));



        return to_route('verify-otp.form')->with('email', $request->email);


    }

    public function showVerifyOTPForm(Request $request){
        //get session
       $email = $request->session()->get('email');
       return view('auth.verify-otp', compact('email'));
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
        ]);

        $otpRecord = Otp::where('email', $request->email)->where('otp', $request->otp)->first();
        if (!$otpRecord) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        if (Carbon::now()->diffInMinutes($otpRecord->created_at) > 10) {
            return back()->withErrors(['otp' => 'OTP has expired']);
        }

        return redirect()->route('reset-password.form')->with('email', $request->email);
    }

    public function showResetPasswordForm(Request $request)
    {
        $email = $request->session()->get('email');
        return view('auth.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        //validate request
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        //search for the user in the users table
        $user = User::where('email', $request->email)->first();

        //update the password in the user table
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Delete the OTP from the OTP table
        Otp::where('email', $request->email)->delete();

        return to_route('login')->with('status', 'Password reset successfully');
    }
}
