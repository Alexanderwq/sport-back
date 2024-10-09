<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrainingTypes;
use Illuminate\Http\Request;

class GetTrainingTypesController
{
  public function __invoke(Request $request): array
  {
    return TrainingTypes::all()->toArray();
  }
}
