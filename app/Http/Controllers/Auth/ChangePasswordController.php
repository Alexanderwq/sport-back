<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordController
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): void
    {
        $request->validate([
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Не правильный логин или пароль.'],
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
    }
}
