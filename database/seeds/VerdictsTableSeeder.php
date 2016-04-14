<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VerdictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 200; $i ++)
        {
            $full_name = $faker->firstName.' '.$faker->lastName;
            $full_name2 = $faker->firstName.' '.$faker->lastName;

            $id = \DB::table('verdicts')->insertGetId(array(
                'identification'        => $faker->unique()->creditCardNumber,
                'applicants'            => $full_name,
                'defendants'            => $full_name2,
                'performance'           => $faker->text($maxNbChars = 50),
                'municipality_id'       => 1,
                'office_id'             => $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
                'date'                  => $faker->date($format = 'Y-m-d', $max = 'now'),
            ));
        }
    }
}
