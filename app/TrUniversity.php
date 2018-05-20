<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrUniversity extends Model
{
    protected $table = 'trainers_universities';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
