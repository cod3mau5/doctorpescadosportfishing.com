<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBoat extends Model
{

    protected $fillable = [
        'name',
        'panga_id','charter_id'
    ];

    public function panga(){
        return $this->belongsTo('App\Panga');
    }
    public function charter(){
        return $this->belongsTo('App\Charter');
    }
}
