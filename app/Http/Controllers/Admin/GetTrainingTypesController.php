<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use App\Models\TrainingTypes;
use Illuminate\Http\Request;

class GetTrainingTypesController
{
  public function __invoke(Request $request): array
  {
    $types = TrainingTypes::all()->toArray();
    $trainers = Trainer::all()->toArray();

    foreach ($types as $type) {
      $type['trainers'] = array_map(function ($id) use ($trainers) {
        $index = array_search($id, array_column($trainers, 'id'));
        return $trainers[$index];
      }, json_decode($type['trainers']) ?? []);
    }
    return $types;
  }
}
