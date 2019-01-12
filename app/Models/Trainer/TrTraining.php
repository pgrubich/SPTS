<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrTraining extends Model
{
    protected $table = 'trainers_trainings_dates';

    public function trainer(){
        return $this->belongsTo('Trainer');
    }

    public function trOrdTr(){
        return $this->hasMany('App\Models\Trainer\TrOrderedTrainings', 'training_id');
    }

}
