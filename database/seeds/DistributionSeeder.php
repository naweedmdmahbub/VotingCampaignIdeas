<?php

use App\Models\Group;
use App\Models\Idea;
use Illuminate\Database\Seeder;

class DistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        foreach($distributions as  $key=> $value){
            foreach($value as $query) {
            //    dd($key, $value,$query,$query['id']);
               $idea = Idea::find($query['id']);
               $idea->group_id = $key;
               $idea->save();
            }
        }

    }
}
