<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Bill extends Model
{
    public function purchages()
    {
        return $this->hasMany('App\Purchage');
    }
    public function finance()
    {
        return $this->hasOne('App\Finance');
    }
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
    public function oldunits()
    {
        return $this->hasMany('App\Oldunit');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function getCrearedHumanAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    protected $appends =['creared_human'];
}
