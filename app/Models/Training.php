<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $casts = [
        'startTime' => 'datetime:H:i',
        'endTime' => 'datetime:H:i',
    ];
}
