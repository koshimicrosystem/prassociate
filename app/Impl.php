<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impl extends Model
{
    public function purchages()
    {
        return $this->morphMany('App\Purchage', 'purchageable');
    }
}
