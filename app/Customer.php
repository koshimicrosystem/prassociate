<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Customer extends Model
{
    protected $fillable = [
        'name',
    ];
    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
    public function cards()
    {
        return $this->hasMany('App\Card');
    }
    public function Contacts()
    {
        return $this->hasMany('App\Contact');
    }
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }
   

    public function getCrearedHumanAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    protected $appends =['creared_human'];
}



