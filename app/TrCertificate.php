<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrCertificate extends Model
{
    protected $table = 'trainers_certificates';
    protected $hidden = ['id','trainer_id'];

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
