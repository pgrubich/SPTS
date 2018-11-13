<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrOpinion extends Model
{
    protected $table = 'trainers_opinions';
    protected $hidden = ['id','trainer_id','updated_at'];

    protected $fillable = ['name', 'email', 'rating', 'description', 'trainer_id'];

    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}
