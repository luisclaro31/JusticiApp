<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeStages extends Model
{
    public function ProcessOffices()
    {
        return $this->hasMany('App\ProcessOffices');
    }
}
