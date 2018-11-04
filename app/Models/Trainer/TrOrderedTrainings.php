<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrOrderedTrainings extends Model
{
    protected $table = 'term_orders';

    public function trainer(){
        return $this->belongsTo('Trainer');
    }
}