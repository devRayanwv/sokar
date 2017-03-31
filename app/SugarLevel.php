<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugarLevel extends Model
{
    protected $fillable = [
        'value', 'timeString_id', 'note', 'medicine_id', 'exercise_id', 'created_at'
    ];

    public function time()
    {
        return $this->hasOne('App\Time', 'id', 'timeString_id');
    }
}
