<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if($request->get('remember'))
        {
            $remember = true;
        }
        else
        {
            $remember = false;
        }

        if(Auth::attempt($credential, $remember)){
            $request->session()->regenerate();

            return redirect()->intended('backend/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records',
        ]);
        // dd($credential);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
