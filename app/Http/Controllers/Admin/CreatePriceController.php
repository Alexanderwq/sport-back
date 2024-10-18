<?php

namespace App\Http\Controllers\Admin;

use App\Models\Price;
use Illuminate\Http\Request;

class CreatePriceController
{
  public function __invoke(Request $request): void
  {
    $request->validate([
      'typeTraining' => 'required|integer',
      'oneVisit' => 'required|integer',
      'monthVisit' => 'required|integer',
    ]);

    Price::query()
      ->insert([
        'training_type' => $request->typeTraining,
        'one_visit' => $request->oneVisit,
        'month_visit' => $request->monthVisit,
      ]);
  }
}
