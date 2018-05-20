<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrOffer extends Model
{
    protected $table = 'trainers_offers';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
