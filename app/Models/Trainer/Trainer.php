<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $hidden = ['password','id'];

    public function trDisc(){
        return $this->hasMany('App\Models\Trainer\TrDiscipline');
    }

    public function trCert(){
        return $this->hasMany('App\Models\Trainer\TrCertificate');
    }

    public function trUni(){
        return $this->hasMany('App\Models\Trainer\TrUniversity');
    }

    public function trLoc(){
        return $this->hasMany('App\Models\Trainer\TrLocation');
    }

    public function trPl(){
        return $this->hasMany('App\Models\Trainer\TrPlace');
    }

    public function trOff(){
        return $this->hasMany('App\Models\Trainer\TrOffer');
    }

    public function trOp(){
        return $this->hasMany('App\Models\Trainer\TrOpinion');
    }

    public function trTr(){
        return $this->hasMany('App\Models\Trainer\TrTraining');
    }

}
