<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {

// Trying to find out frequency of each country
        // $items =Idea::leftJoin('users', 'ideas.user_id', '=', 'users.id')
        //     ->leftJoin('countries', 'users.country_id', '=', 'countries.id')
        //     ->leftJoin('states', 'users.state_id', '=', 'states.id')
        //     ->select('ideas.id', 'ideas.title', 'users.username', 'users.age_group as age_group', 'countries.name as country', 'countries.id as country_id', 'states.name as state')
        //     ->orderBy('country')
        //     ->orderBy('state')
        //     ->orderBy('age_group')
        //     ->orderBy('users.id')
        //     ->get();
        // $arr = [];
        // $data = [];
        // foreach($items->groupBy('country')->map(function($values) {return $values->count(); }) as $key => $quantity){
        //     $data['country_id'] = $key;
        //     $data['freq'] = $quantity;
        //     array_push($arr, $data);
        // }
        // $sortedArr = collect($arr)->sortBy('freq')->reverse()->toArray();
        // dd($items,$arr,$sortedArr);
        $ideas =Idea::leftJoin('users', 'ideas.user_id', '=', 'users.id')
            ->leftJoin('countries', 'users.country_id', '=', 'countries.id')
            ->leftJoin('states', 'users.state_id', '=', 'states.id')
            ->select('ideas.id', 'ideas.title', 'users.username', 'users.age_group as age_group', 'countries.name as country', 'states.name as state')
            ->orderBy('country')
            ->orderBy('state')
            ->orderBy('age_group')
            ->get()->toArray();

        $groups = Group::all();


        $distributions = array();

        foreach($groups as $group) {
            $distributions[$group->id] = array();
        }
        // print_r(array_keys($distributions));
        // dd($ideas, $distributions);

        $i = 0;
        while($i<count($ideas)) {
            foreach($groups as $group) {
                array_push($distributions[$group->id],$ideas[$i]);
                $i++;
                if($i == count($ideas)) break;
            }
            // print_r($i.'<br>');
        }
        // dd($ideas, $distributions);

        // foreach($distributions as  $key=> $value){
        //     foreach($value as $query) {
        //         // print_r($value);
        //         dd($key, $value,$query,$query['id']);
        //         $idea = Idea::find($query['id']);
        //         $idea->group_id = $key;
        //         $idea->save();
        //     }
        // }
        $this->pairing($distributions);
    }






    public function pairing($distributions)
    {
        $groups = Group::all();
        foreach($groups as $group){
            DB::table('group_idea_pairs')->where('group_id', $group->id)->delete();
            $ideas = Idea::with('user')->where('group_id',$group->id)->get();

            $ideas =Idea::leftJoin('users', 'ideas.user_id', '=', 'users.id')
                ->leftJoin('countries', 'users.country_id', '=', 'countries.id')
                ->leftJoin('states', 'users.state_id', '=', 'states.id')
                ->select('ideas.id', 'users.id as user_id', 'users.age_group as age_group', 'countries.id as country', 'states.id as state')
                ->orderBy('country')
                ->orderBy('state')
                ->orderBy('age_group')
                ->where('group_id',$group->id)
                ->get()->toArray();

            // $pairs = [];
            $len = count($ideas);
            for($i=0, $j=$len-1; $i*2<$len;  $i++,$j-- ){
                // array_push($pairs,[ $ideas[$i]['id'], $ideas[$j]['id'] ]);
                // dd($ideas,$pairs, $ideas[$i]['id'], $ideas[$j]['id']);
                $pair_array_saving = array($ideas[$i]['id'], $ideas[$j]['id']);
                $string=implode(",",$pair_array_saving);
                // $data = new GroupIdeaPair();
                $data['group_id'] = $group->id;
                $data['ideas'] = $string;
                $groupIdeaPair = GroupIdeaPair::create($data);
            }

            // dd($ideas,$pairs, GroupIdeaPair::all());
        }
    }
}
