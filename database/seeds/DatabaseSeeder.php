<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //  $this->call(GroupSeeder::class);
        //  $this->call(IdeaSeeder::class);
         $this->call(DistributionSeeder::class);
         // \App\Models\Group::factory(5)->create();
    }
}
