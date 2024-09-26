<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class UserController
{
    public function __invoke(Request $request) {
        return $request->user();
    }
}
