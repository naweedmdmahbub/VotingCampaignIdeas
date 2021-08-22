<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Idea;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    
    public function index()
    {
        $groups = Group::all();
        return view('groups.index',compact('groups'));
    }
}
