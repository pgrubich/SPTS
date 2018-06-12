<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrLocation extends Model
{
    protected $table = 'trainers_location';
    protected $hidden = ['id','trainer_id','created_at','updated_at'];
    protected $fillable = ['city','voivodeship', 'trainer_id'];

    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}
