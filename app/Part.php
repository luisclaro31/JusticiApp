<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public function ProcessActors()
    {
        return $this->hasMany('App\ProcessActors');
    }
}
