<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupIdeaPair extends Model
{
    protected $fillable = ['group_id','ideas'];

    public $timestamps = false;
}
