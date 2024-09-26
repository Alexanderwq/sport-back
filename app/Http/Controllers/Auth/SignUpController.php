<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController
{
    public function __invoke(Request $request) {
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'name' => 'required',
            'device_name' => 'required',
        ]);

        User::query()->insert([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        $user = User::where('email', $request->email)->first();

        return $user->createToken($request->device_name)->plainTextToken;
    }
}
