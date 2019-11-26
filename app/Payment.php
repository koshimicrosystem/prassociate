<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payment extends Model
{
    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }

    public function getCrearedHumanAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    protected $appends =['creared_human'];
}
