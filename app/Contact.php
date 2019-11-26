<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'default','name','number_email','type',
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
