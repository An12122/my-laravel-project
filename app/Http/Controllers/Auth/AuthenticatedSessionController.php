<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function create()
    {
        return view('auth.login');
    }

    // عرض صفحة إنشاء حساب
    public function register()
    {
        return view('auth.register');
    }

    // معالجة تسجيل الدخول
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // توجيه الأدمن
            if ($user->email === 'an@test.com') {
                return redirect()->route('admin.dashboard');
            }

            // باقي المستخدمين
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'بيانات الدخول غير صحيحة'])->withInput();
    }

    // معالجة إنشاء الحساب
    public function storeRegister(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // تسجيل الدخول تلقائي بعد إنشاء الحساب

        return redirect()->route('dashboard');
    }

    // تسجيل الخروج
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
