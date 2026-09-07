<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\OtpCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;

class OtpController extends Controller
{
    public function show(Request $request): Response
    {
        return Inertia::render('auth/OtpVerify', [
            'status' => $request->session()->get('status'),
        ]);
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $user = Auth::user();

        $otpCode = OtpCode::where('email', $user->email)
            ->where('code', $request->input('otp'))
            ->where('expires_at', '>', now())
            ->first();

        if (! $otpCode) {
            return back()->withErrors(['otp' => 'The code is invalid or has expired.']);
        }

        $user->markEmailAsVerified();
        $otpCode->delete();

        return redirect()->intended(route('dashboard'));
    }

    public function resend(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        $otp = OtpCode::generate($user->email);

        Mail::to($user->email)->send(new OtpMail($otp->code, $user->name));

        return back()->with('status', 'A new verification code has been sent to your email address.');
    }
}
