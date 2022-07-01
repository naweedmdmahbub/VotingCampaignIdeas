<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function groupIdeaPairs(){
        return $this->hasMany(GroupIdeaPair::class);
    }
}
