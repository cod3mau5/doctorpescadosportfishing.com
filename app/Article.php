<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        'title','content','slug','date','thumbnail','thumbnail_path'
    ];
    public function getRouteKeyName(){
        return 'slug';
    }
}
