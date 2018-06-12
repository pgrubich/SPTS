<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrUniversity extends Model
{
    protected $table = 'trainers_universities';
    protected $hidden = ['id','trainer_id','created_at','updated_at'];
    protected $fillable = ['university','course','degree', 'begin_date', 'end_date', 'trainer_id'];


    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}
