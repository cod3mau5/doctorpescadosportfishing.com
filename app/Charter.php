<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charter extends Model
{
    protected $fillable = [
        'name','img', 'description',
        'max_anglers','feets','panga_id','charter_id'
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
        return $this->hasOne('App\ImageBoat');
    }
    public function captain()
    {
        return $this->hasOne('App\Captain');
    }
}
