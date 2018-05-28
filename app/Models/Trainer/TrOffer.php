<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrOffer extends Model
{
    protected $table = 'trainers_offers';
    protected $hidden = ['id','trainer_id'];
    protected $fillable = ['name','price','max_no_of_clients', 'trainer_id'];


    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}
