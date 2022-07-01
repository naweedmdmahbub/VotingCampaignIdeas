<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $fillable = ['voter_id','group_id', 'group_idea_pairs_id', 'voted', 'voted_to'];
    
    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

}
