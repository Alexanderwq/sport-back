<?php

namespace App\Http\Controllers;

use App\Models\Training;

class RemoveScheduleController
{
  public function __invoke(string $id): void
  {
    Training::query()
      ->where('id', $id)
      ->delete();
  }
}
