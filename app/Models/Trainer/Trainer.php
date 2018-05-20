<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $hidden = ['password','id'];
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

}
