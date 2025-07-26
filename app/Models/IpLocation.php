<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpLocation extends Model
{
    protected $fillable = ['ip_address', 'latitude', 'longitude', 'country', 'city'];
}