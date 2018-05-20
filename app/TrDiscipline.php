<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrDiscipline extends Model
{
    protected $table = 'trainers_disciplines';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }

    public function discipline(){
        return $this->hasMany('App\Discipline');
    }
}
