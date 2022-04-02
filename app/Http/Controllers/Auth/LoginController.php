<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [

                'required' => 'Thuộc tính :attribute Không được để trống',
            ],
        );

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Chức năng nhớ tài khoản

        if($request->get('remember'))
        {
            $remember = true;
        }
        else
        {
            $remember = false;
        }

        // Kiểm tra thành công thì qua trang home
        if(Auth::attempt($credential, $remember)){
            $request->session()->regenerate();

            return redirect()->intended('backend/dashboard');
        }
// Ngược lại quay lại trang login và hiện thông báo
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
