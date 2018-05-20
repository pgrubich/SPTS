<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrOpinion extends Model
{
    protected $table = 'trainers_opinions';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
