<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
{
    return view('auth.register');
}

public function store(Request $request)
{
    // $request->validate([
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
    // ]);

    // $user = User::create([
    //     'name' => $request->name,
    //     'email' => $request->email,
    //     'password' => Hash::make($request->password),
    // ]);
    // return back();

    $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed',
            ],
            [
                'required' => 'Thuộc tính :attribute không được để trống',
                'email.unique' => 'Thuộc tính :attribute đã được đăng ký',
            ],
        );

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
}
}
