<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use Illuminate\Http\Request;

class CreateTrainerController
{
  public function __invoke(Request $request): array
  {
    $request->validate([
      'name' => 'required|string',
      'lastName' => 'required|string',
      'jobTitle' => 'required|string',
    ]);

    Trainer::query()
      ->insert([
        'name' => $request->name,
        'last_name' => $request->lastName,
        'job_title' => $request->jobTitle,
      ]);

    return Trainer::all()->toArray();
  }
}
