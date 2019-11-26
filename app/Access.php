<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public function purchages()
    {
        return $this->morphMany('App\Purchage', 'purchageable');
    }
}
