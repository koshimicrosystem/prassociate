<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name','number'
    ];
    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
