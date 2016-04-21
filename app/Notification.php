<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'description',
    ];

    public function ProcessMovements()
    {
        return $this->hasMany('App\ProcessMovements');
    }

    public function Verdict()
    {
        return $this->hasMany('App\Verdict');
    }
}
