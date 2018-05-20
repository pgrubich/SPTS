<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $hidden = ['password','id'];

    public function trDisc(){
        return $this->hasMany('App\TrDiscipline');
    }

    public function trCert(){
        return $this->hasMany('App\TrCertificate');
    }

    public function trUni(){
        return $this->hasMany('App\TrUniversity');
    }

    public function trLoc(){
        return $this->hasMany('App\TrLocation');
    }

    public function trPl(){
        return $this->hasMany('App\TrPlace');
    }

    public function trOff(){
        return $this->hasMany('App\TrOffer');
    }

    public function trOp(){
        return $this->hasMany('App\TrOpinion');
    }

    public function trTr(){
        return $this->hasMany('App\TrTraining');
    }

}
