<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrTraining extends Model
{
    protected $table = 'trainers_trainings_dates';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
