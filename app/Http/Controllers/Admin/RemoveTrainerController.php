<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;

class RemoveTrainerController
{
  public function __invoke(string $id): void
  {
    Trainer::query()
      ->where('id', $id)
      ->delete();
  }
}
