<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogin(){

        if (!Auth::check()) {
            return view('auth/adminlogin');
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function loginPost(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::check()) {
            $user = User::where('email', $request->email)->first();
            if($user->status == 0) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    return to_route('dashboard');
                }
            }else{
                return back()->withErrors([
                    'error' => 'Your Account Deactived',
                ]);
            }
        }else{
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'error' => 'Email or Password is invalid',
        ]);
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('adminLogin');
    }

    public function register() {
        return view('backend.pages.register.register');
    }

    public function userEdit($id) {
        return view('backend.pages.user.editUser', compact('id'));
    }

    public function users() {
        return view('backend.pages.user.user');
    }

    public function profile() {
        return view('backend.pages.profile.profile');
    }
}
