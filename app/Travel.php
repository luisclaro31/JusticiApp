<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'description',
    ];

    public function Process()
    {
        return $this->hasMany('App\Process');
    }
}
