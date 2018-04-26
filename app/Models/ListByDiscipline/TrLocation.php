<?php

namespace App\Models\ListByDiscipline;

use Illuminate\Database\Eloquent\Model;

class TrLocation extends Model
{
    protected $table = 'trainers_location';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Models\ListByDiscipline\Trainer');
    }
}
