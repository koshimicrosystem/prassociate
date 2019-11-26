<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name', 'number'
    ];
    public function documentable()
    {
        return $this->morphTo();
    }
}
