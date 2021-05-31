<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panga extends Model
{
    protected $fillable = [
        'name','img', 'description', 'feets',
        'max_anglers','panga_id','charter_id'
    ];
    public function rate()
    {
        return $this->hasOne('App\Rate');
    }
    public function feature()
    {
        return $this->hasOne('App\BoatSpecification');
    }
    public function images()
    {
        return $this->hasMany('App\ImageBoat');
    }
    public function captain()
    {
        return $this->hasOne('App\Captain');
    }
}
