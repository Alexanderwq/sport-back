<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use Illuminate\Http\Request;

class ScheduleListController
{
  public function __invoke(Request $request): array
  {
    return Training::query()
      ->select([
        'trainings.id as id',
        'trainers.name as trainerName',
        'trainers.last_name as trainerLastName',
        'types_training.name as sportName',
        'trainings.start_time as startTime',
        'trainings.end_time as endTime',
      ])
      ->join('trainers', 'trainers.id', '=', 'trainings.id_trainer')
      ->join('types_training', 'types_training.id', '=', 'trainings.type_training')
      ->get()
      ->toArray();
  }
}
