<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoatSpecification extends Model
{
    
    protected $fillable = [
        'fishing_gear','boat_features',
        'panga_id','charter_id'
    ];

    public function panga(){
        return $this->belongsTo('App\Panga');
    }
    public function charter(){
        return $this->belongsTo('App\Charter');
    }
}
