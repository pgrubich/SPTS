<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrTraining extends Model
{
    protected $table = 'trainers_trainings_dates';
    protected $appends = ['full_begin_date', 'full_end_date'];

    public function trainer(){
        return $this->belongsTo('Trainer');
    }

    public function trOrdTr(){
        return $this->hasMany('App\Models\Trainer\TrOrderedTrainings', 'training_id');
    }

    public function getFullBeginDateAttribute()
    {
        return $this->date.(' ').($this->begin_time);
    }

    public function getFullEndDateAttribute()
    {
        return $this->date.(' ').($this->end_time);
    }

}
