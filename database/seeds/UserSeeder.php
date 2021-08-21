<?php

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_countries = Country::count();
        $number_of_states = State::count();

        $faker = Faker\Factory::create();
        for($i = 0; $i < 30; $i++) {
            $username = $faker->name;
            $date_of_birth = $faker->dateTimeBetween('1940-01-01', '2008-12-31')->format('Y-m-d');
            $country_id = $faker->numberBetween(1,$number_of_countries);
            $state_ids = State::where('country_id',$country_id)->pluck('id');
            $state_id = $faker->randomElement($state_ids);
            // dd($country_id,$state_ids, $state_id );
            
            App\User::create([
                'username' => $username,
                'date_of_birth' => $date_of_birth,
                'country_id' => $country_id,
                'state_id' => $state_id
            ]);
        }
    }
}
