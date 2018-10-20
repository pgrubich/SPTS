<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Trainer extends Authenticatable
{
    protected $table = 'trainers';
    protected $hidden = ['password','id','remember_token'];
    protected $fillable = ['password','email'];
    const CREATED_AT = 'registerDate';
    public $timestamps = false;

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

    public function trOrdTr(){
        return $this->hasMany('App\Models\Trainer\TrOrderedTrainings');
    }

}
