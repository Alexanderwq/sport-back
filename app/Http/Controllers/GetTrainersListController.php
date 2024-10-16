<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetTrainersListController
{
  public function __invoke(Request $request): Collection
  {
    return Trainer::query()
      ->get();
  }
}
