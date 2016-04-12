<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verdict extends Model
{
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
            $query->where('office_id', $municipality);
        }

    }

    public function scopeOffice($query, $office)
    {
        if ($office != "" )
        {
            $query->where('office_id', $office);
        }

    }

}
