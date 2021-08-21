<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'date_of_birth', 'country_id', 'state_id'
    ];
    
    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
