<?php

use Illuminate\Database\Seeder;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sql/countries-states.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
