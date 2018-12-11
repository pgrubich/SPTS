<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class TrPhotos extends Model
{
    protected $table = 'trainers_photos';
    protected $hidden = ['trainer_id','created_at','updated_at'];
    protected $fillable = ['trainer_id', 'photo_name'];

    public function trA(){
        return $this->belongsTo('\Trainer');
    }
}