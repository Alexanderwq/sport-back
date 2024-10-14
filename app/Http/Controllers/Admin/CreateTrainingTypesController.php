<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrainingTypes;
use Illuminate\Http\Request;

class CreateTrainingTypesController
{
  public function __invoke(Request $request): array
  {
    $request->validate([
      'name' => 'required|string',
    ]);

    TrainingTypes::query()
      ->insert([
        'name' => $request->name,
      ]);

    return TrainingTypes::all()->toArray();
  }
}
