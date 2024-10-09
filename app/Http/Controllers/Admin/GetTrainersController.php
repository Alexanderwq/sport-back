<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use Illuminate\Http\Request;

class GetTrainersController
{
  public function __invoke(Request $request): array
  {
    return Trainer::all()->toArray();
  }
}
