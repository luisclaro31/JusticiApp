<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verdict extends Model
{
    public function Notification()
    {
        return $this->belongsTo('App\Notification');
    }

    public function scopeIdentification($query, $identification)
    {
        if (trim($identification) != "")
        {
            $query->where('identification', "LIKE", "%$identification%");
        }

    }

    public function scopeMunicipality($query, $municipality)
    {

        if ($municipality != "" )
        {
            $query->where('municipality_id', $municipality);
        }

    }

    public function scopeOffice($query, $office)
    {
        if ($office != "" )
        {
            $query->where('office_id', $office);
        }

    }

    public function scopeDate($query, $date)
    {
        if ($date != "" )
        {
            $query->where('date', $date);
        }

    }

    public function scopeNotification($query, $notification)
    {
        if ($notification != "" )
        {
            $query->where('notification_id', $notification);
        }

    }

}
