<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'description',
    ];

    public function Office()
    {
        return $this->hasMany('App\Office');
    }
}
