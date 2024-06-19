<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login_view()
    {
        return view('auth.login');
    }

    public function regis_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
        ]);
    
        return redirect()->route('login_view')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && $credentials['password'] === $user->password) {
            Auth::login($user);

            if ($user->level == 1) {
                return redirect()->route('dashboard_user_view');
            } else if ($user->level == 2) {
                return redirect()->route('dashboard_admin_view');
            } else if ($user->level == 3) {
                return redirect()->route('dashboard_pakar_view');
            }
        }

        return redirect()->back()->withErrors(['login' => 'Login failed. Please check your credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login_view');
    }
}
