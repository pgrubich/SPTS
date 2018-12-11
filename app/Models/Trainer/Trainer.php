<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Trainer extends Authenticatable
{
    use Notifiable;
    protected $table = 'trainers';
    protected $hidden = ['password','remember_token'];
    protected $fillable = ['password','email','remember_token'];
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
        return $this->hasMany('App\Models\Trainer\TrTraining')->where('status', "wolne");
    }

    public function trOrdTr(){
        return $this->hasMany('App\Models\Trainer\TrOrderedTrainings');
    }

    public function trPh(){
        return $this->hasMany('App\Models\Trainer\TrPhotos');
    }

}
