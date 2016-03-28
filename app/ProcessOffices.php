<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessOffices extends Model
{
    protected $fillable = [
        'process_id', 'office_id', 'stage_id'
    ];

    public function Office()
    {
        return $this->belongsTo('App\Office');
    }

    public function Stage()
    {
        return $this->belongsTo('App\OfficeStages');
    }
}
