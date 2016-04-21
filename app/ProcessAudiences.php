<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessAudiences extends Model
{
    protected $fillable = [
        'process_id', 'date', 'time', 'office_id'
    ];

    public function Office()
    {
        return $this->belongsTo('App\Office');
    }

    public function Process()
    {
        return $this->belongsTo('App\Process');
    }
}
