<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrOrderedTrainings extends Model
{
    protected $table = 'term_orders';
    protected $fillable = ['name','surname','phone', 'email','description', 'training_id'];


    public function trtraining(){
        return $this->belongsTo('TrTraining');
    }

}