<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GetGymsController
{
    public function __invoke(Request $request): Collection
    {
        return Gym::all();
    }
}
