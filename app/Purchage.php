<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchage extends Model
{
    public function purchageable()
    {
        return $this->morphTo();
    }

    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }
}
