<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        'identification','identification_two','objective','quantity','email','details','action_id','state_id','stage_id','travel_id','municipality_id',
    ];

    public function State()
    {
        return $this->belongsTo('App\State');
    }

    public function Stage()
    {
        return $this->belongsTo('App\Stage');
    }

    public function Action()
    {
        return $this->belongsTo('App\Action');
    }

    public function Travel()
    {
        return $this->belongsTo('App\Travel');
    }

    public function Municipality()
    {
        return $this->belongsTo('App\Municipality');
    }

    public function Notification()
    {
        return $this->belongsTo('App\Notification');
    }

    public function ProcessActors()
    {
        return $this->hasMany('App\ProcessActors');
    }
}
