<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected function captchaEnabled(): bool
    {
        return !empty(config('services.recaptcha.secret'));
    }

    protected function verifyCaptcha(Request $request): bool
    {
        if (!$this->captchaEnabled()) {
            return true;
        }
        $response = $request->input('g-recaptcha-response');
        if (empty($response)) {
            return false;
        }
        $res = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $response,
            'remoteip' => $request->ip(),
        ]);
        if (!$res->ok()) {
            return false;
        }
        $data = $res->json();
        return !empty($data['success']);
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($request->filled('hp')) {
            return back()->withErrors(['email' => 'Permintaan tidak valid.']);
        }
        if (!$this->verifyCaptcha($request)) {
            return back()->withErrors(['email' => 'Verifikasi tidak lolos.'])->onlyInput('email');
        }

        $key = 'admin-login:'.strtolower($request->input('email')).'|'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => 'Terlalu banyak percobaan. Coba lagi '.ceil($seconds/60).' menit.',
            ])->onlyInput('email');
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            RateLimiter::clear($key);
            return redirect()->intended(route('admin.dashboard'));
        }

        RateLimiter::hit($key, 300);
        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }


    public function showForgotPasswordForm()
    {
        return view('admin.auth.forgot');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        if ($request->filled('hp')) {
            return back()->withErrors(['email' => 'Permintaan tidak valid.']);
        }
        if (!$this->verifyCaptcha($request)) {
            return back()->withErrors(['email' => 'Verifikasi tidak lolos.']);
        }
        $key = 'admin-forgot:'.strtolower($request->input('email')).'|'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => 'Terlalu banyak permintaan. Coba lagi '.ceil($seconds/60).' menit.',
            ]);
        }
        $status = Password::broker('admins')->sendResetLink($request->only('email'));
        if ($status === Password::RESET_LINK_SENT) {
            RateLimiter::clear($key);
        } else {
            RateLimiter::hit($key, 600);
        }
        return back()->with('success', 'Jika email terdaftar, tautan reset telah dikirim.');
    }

    public function showResetForm(Request $request, string $token)
    {
        return view('admin.auth.reset', ['token' => $token, 'email' => $request->query('email')]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($request->filled('hp')) {
            return back()->withErrors(['email' => 'Permintaan tidak valid.']);
        }
        if (!$this->verifyCaptcha($request)) {
            return back()->withErrors(['email' => 'Verifikasi tidak lolos.']);
        }

        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin) use ($request) {
                $admin->forceFill([
                    'password' => Hash::make($request->password),
                ]);
                $admin->setRememberToken(Str::random(60));
                $admin->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
