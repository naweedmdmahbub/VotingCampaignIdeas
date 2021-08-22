<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Idea;
use App\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    
    public function index()
    {

        $ideas =Idea::leftJoin('users', 'ideas.user_id', '=', 'users.id')
            ->leftJoin('countries', 'users.country_id', '=', 'countries.id')
            ->leftJoin('states', 'users.state_id', '=', 'states.id')
            ->select('ideas.id', 'ideas.title', 'users.username', 'users.age_group', 'countries.name as country', 'states.name as state')
            ->orderBy('country')
            ->orderBy('state')
            ->orderBy('age_group')
            ->orderBy('users.id')
            ->get();

        $groups = Group::all();
        return view('ideas.index',compact('ideas','groups'));
        // dd($ideas);
    }

    public function group($id)
    {
        $ideas =Idea::leftJoin('users', 'ideas.user_id', '=', 'users.id')
            ->leftJoin('countries', 'users.country_id', '=', 'countries.id')
            ->leftJoin('states', 'users.state_id', '=', 'states.id')
            ->leftJoin('groups', 'ideas.group_id', '=', 'groups.id')
            ->select('ideas.id', 'ideas.title', 'users.username', 'users.age_group', 'countries.name as country', 'states.name as state')
            ->orderBy('country')
            ->orderBy('state')
            ->orderBy('age_group')
            ->orderBy('users.id')
            ->where('groups.id',$id)
            ->get();

        $groups = Group::all();
        $idea_group = Group::find($id);
        return view('ideas.group',compact('ideas','groups','idea_group'));

    }
}
