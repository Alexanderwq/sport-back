<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetPricesController
{
  public function __invoke(Request $request): Collection
  {
    $prices = Price::query()
      ->select([
        'prices.*',
        'types_training.name',
        'types_training.trainers',
      ])
      ->join('types_training', 'types_training.id', '=', 'prices.training_type')
      ->get();

    $trainers = Trainer::all()->toArray();

    foreach ($prices as $price) {
      $price['trainers'] = array_map(function ($id) use ($trainers) {
        $index = array_search($id, array_column($trainers, 'id'));
        return $trainers[$index];
      }, json_decode($price['trainers']));
    }
    return $prices;
  }
}
