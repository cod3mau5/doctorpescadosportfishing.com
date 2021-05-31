<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email',
        'orderID','address',
        'charter','duration',
        'fishingDate','fishingTime',
        'request','anglers','subtotal',	
        'cost','client_origin',
    ];
}
