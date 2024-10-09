<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateTrainingController
{
  public function __invoke(Request $request): void
  {
    $request->validate([
      'trainerId' => 'required|integer',
      'typeTraining' => 'required|integer',
      'startTime' => 'required|date',
      'endTime' => 'required|date',
    ]);

    Training::query()
      ->insert([
        'id_trainer' => $request->trainerId,
        'type_training' => $request->typeTraining,
        'start_time' => Carbon::createFromTimestamp(strtotime($request->startTime))->format('y-m-d H:i:s'),
        'end_time' => Carbon::createFromTimestamp(strtotime($request->endTime))->format('y-m-d H:i:s'),
      ]);
  }
}
