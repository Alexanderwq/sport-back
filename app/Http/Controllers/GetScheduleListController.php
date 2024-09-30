<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetScheduleListController
{
    public function __invoke(Request $request): Collection
    {
        $date = Carbon::createFromFormat('d.m.Y', $request->date);

        return Training::query()
            ->select([
                'types_training.name as sportName',
                'trainings.start_time as startTime',
                'trainings.end_time as endTime',
                'trainers.name as trainerName',
            ])
            ->join('trainers', 'trainers.id', '=', 'trainings.id_trainer')
            ->join('types_training', 'types_training.id', '=', 'trainings.type_training')
            ->whereDay('start_time', '=', $date)
            ->get();
    }
}
