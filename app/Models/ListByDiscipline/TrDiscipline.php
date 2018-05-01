<?php

namespace App\Models\ListByDiscipline;

use Illuminate\Database\Eloquent\Model;

class TrDiscipline extends Model
{
    protected $table = 'trainers_disciplines';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Models\ListByDiscipline\Trainer');
    }
}