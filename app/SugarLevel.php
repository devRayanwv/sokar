<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugarLevel extends Model
{
    protected $fillable = [
        'value', 'timeOfTest', 'note', 'medicine_id', 'exercise_id'
    ];
}
