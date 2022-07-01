<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Group;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    
    public function voting($voter_id, $group_id)
    {
        // groupIdeaPairs
        $groups = Group::all();
        $group = Group::with('groupIdeaPairs')->find($group_id);
        // dd($group);

        foreach($group->groupIdeaPairs as $key=>$value){
            // dd($key);
            // dd($key,$value,$value,$value->ideas);
             print_r($group->id.'-> '. $value->id.'-> '. $value->ideas.'<br>');
        }
        // dd('sdad');
        return view('votes.voting',compact('group','groups','voter_id','group_id'));
    }



    
    public function show($voter_id, $group_id)
    {
        
    }


    
    public function store(Request $request, $voter_id, $group_id)
    {
        try {
            $input = $request->only('voter_id', 'group_id', 'email' , 'date_of_birth', 'address', 'phone', 'salary');
            $arr = array();
            DB::beginTransaction();
            foreach($request->voted as $group_idea_pairs_id => $voted_to){
                $voting = new Voting();
                $voting->voter_id = $voter_id;
                $voting->group_id= $group_id;
                $voting->group_idea_pairs_id= $group_idea_pairs_id;
                $voting->voted_to= $voted_to;
                print_r($voting);
                array_push($arr,$voting);
            }
            dd($voter_id, $group_id,$request->all(),$request->voted,$arr);
            DB::commit();
        } catch(Exception $exception) {
            DB::rollBack();
        }
    }
}
