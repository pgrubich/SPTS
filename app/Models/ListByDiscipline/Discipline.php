<?php

namespace App\Models\ListByDiscipline;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines';

    public function trD(){
        return $this->belongsTo('TrDiscipline');
    }
}