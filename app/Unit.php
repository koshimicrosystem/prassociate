<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Unit extends Model
{
    protected $fillable = [
        'unitmodel_id'
    ];
    public function unitmodel()
    {
        return $this->belongsTo('App\Unitmodel');
    }

    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function purchages()
    {
        return $this->morphMany('App\Purchage', 'purchageable');
    }   
    // Unit::find(13)->purchages[0]->bill->customer->id

    // public function getCrearedHumanAttribute(){
    //     return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    // }
    // protected $appends =['creared_human'];

    // public function getUnitModelAttribute(){
    //    $unit = Unit::find($this->id);
    //    return "{$unit->unitmodel->model_name}";
    // }
    // protected $appends =['unit_model'];
}
