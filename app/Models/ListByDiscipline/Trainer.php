<?php

namespace App\Models\ListByDiscipline;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $hidden = ['password','gender','phone','email','rating','registerDate'];

    public function trDisc(){
        return $this->hasMany('TrDiscipline');
    }

}
