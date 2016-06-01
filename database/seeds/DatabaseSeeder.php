<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(InfoTableSeeder::class);
        $this->call(FillersTableSeeder::class);
        //$this->call(VerdictsTableSeeder::class);
    }
}
