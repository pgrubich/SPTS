<?php

namespace App\Models\ListByDiscipline;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $hidden = ['password','phone','email','registerDate'];
    
    public function trDisc(){
        return $this->hasMany('App\Models\ListByDiscipline\TrDiscipline');
    }

    public function trLoc(){
        return $this->hasMany('App\Models\ListByDiscipline\TrLocation');
    }

    public function trPl(){
        return $this->hasMany('App\Models\ListByDiscipline\TrPlace');
    }

    public function trPh(){
        return $this->hasMany('App\Models\Trainer\TrPhotos');
    }

    public function trOff(){
        return $this->hasMany('App\Models\Trainer\TrOffer');
    }

}
