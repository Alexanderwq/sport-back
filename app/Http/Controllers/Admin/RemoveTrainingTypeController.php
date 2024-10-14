<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrainingTypes;

class RemoveTrainingTypeController
{
  public function __invoke(string $id): void
  {
    TrainingTypes::query()
      ->where('id', $id)
      ->delete();
  }
}
