<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessMovements extends Model
{
    protected $fillable = [
        'process_id', 'description', 'date', 'notification_date', 'expiration_date', 'office_id', 'notification_id', 'file', 'email'
    ];

    public function Process()
    {
        return $this->belongsTo('App\Process');
    }

    public function Office()
    {
        return $this->belongsTo('App\Office');
    }

    public function Notification()
    {
        return $this->belongsTo('App\Notification');
    }
}
