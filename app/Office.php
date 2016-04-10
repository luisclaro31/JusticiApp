<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'description', 'speciality_id', 'location_id',
    ];

    public function ProcessOffices()
    {
        return $this->hasMany('App\ProcessOffices');
    }

    public function ProcessAudiences()
    {
        return $this->hasMany('App\ProcessAudiences');
    }

    public function ProcessMovements()
    {
        return $this->hasMany('App\ProcessMovements');
    }

    public function Speciality()
    {
        return $this->belongsTo('App\Speciality');
    }

    public function Location()
    {
        return $this->belongsTo('App\Location');
    }

    public function OfficeStages()
    {
        return $this->belongsTo('App\OfficeStages');
    }

    public function scopeSpecialities($query, $speciality)
    {
        if ($speciality != "" )
        {
            $query->where('speciality_id', $speciality);
        }

    }
}
