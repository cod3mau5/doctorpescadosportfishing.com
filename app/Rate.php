<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'panga_id','charter_id',
        'half_day','full_day',
        'half_day_description','full_day_description',
        'duration_half_day','duration_full_day',
        'default_half_day_description','default_full_day_description'
    ];
    public function panga(){
        return $this->belongsTo('App\Panga');
    }
    public function charter(){
        return $this->belongsTo('App\Charter');
    }
}
