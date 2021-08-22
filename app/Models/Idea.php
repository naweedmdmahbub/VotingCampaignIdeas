<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['user_id', 'group_id', 'title', 'desc'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
