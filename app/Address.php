<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'block','tehshil','village','default'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
