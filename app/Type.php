<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function User()
    {
        return $this->hasMany('App\User');
    }
}
