<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrOffer extends Model
{
    protected $table = 'trainers_offers';
    protected $hidden = ['trainer_id','created_at','updated_at'];
    protected $fillable = ['name','price','max_no_of_clients', 'trainer_id'];


    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}
