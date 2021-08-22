<?php

use App\User;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 30; $i++) {
            $user_ids = User::all()->pluck('id');
            // dd($user_ids);
            App\Models\Idea::create([
                'title' => $faker->sentence(5),
                'desc' => $faker->text,
                'user_id' => $faker->randomElement($user_ids),
            ]);
        }
    }
}
