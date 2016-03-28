<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'description',
    ];

    public function Process()
    {
        return $this->hasMany('App\Process');
    }
}
