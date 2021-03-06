<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identification', 'professional_card', 'full_name', 'phone', 'birth_date', 'address', 'details', 'image', 'email', 'password', 'type_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Type()
    {
        return $this->belongsTo('App\Type');
    }


    public function ProcessActors()
    {
        return $this->hasMany('App\ProcessActors');
    }

    public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function setImageAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['image'] = $this->attributes['identification'].'.'.$value->getClientOriginalExtension();
        }
    }

    public function is($type_id)
    {
        return $this->type_id === $type_id;
    }
}
