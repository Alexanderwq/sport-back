<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetPricesController
{
  public function __invoke(Request $request): Collection
  {
    return Price::query()
      ->select([
        'prices.*',
        'types_training.name',
      ])
      ->join('types_training', 'types_training.id', '=', 'prices.training_type')
      ->get();
  }
}
