<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrPlace extends Model
{
    protected $table = 'trainers_places';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}
