<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = \Hash::make($value);
    }
}
