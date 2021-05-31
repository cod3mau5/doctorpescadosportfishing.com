<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $fillable = [
        'captain_img',
        'name',
        'origin' ,
        'experience',
        'favorite_fish',
        'reason_to_fish' ,
        'hobby',
        'panga_id',
        'charter_id'
    ];
    public function panga()
    {
        return $this->hasMany('App\Panga');
    }
    public function charter()
    {
        return $this->hasMany('App\Charter');
    }
}
