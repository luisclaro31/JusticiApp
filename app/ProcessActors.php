<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessActors extends Model
{
    protected $fillable = [
        'process_id', 'part_id', 'user_id'
    ];

    public function Process()
    {
        return $this->belongsTo('App\Process');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Part()
    {
        return $this->belongsTo('App\Part');
    }

}
