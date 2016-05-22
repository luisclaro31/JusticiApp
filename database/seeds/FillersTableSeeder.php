<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FillersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 100; $i ++)
        {
            $full_name = $faker->firstName.' '.$faker->lastName;

            $id = \DB::table('users')->insertGetId(array(
                'identification'        => $faker->unique()->ean8,
                'professional_card'     => $faker->unique()->ean8,
                'full_name'             => $full_name,
                'phone'                 => $faker->biasedNumberBetween($min = 3001111111, $max = 3009999999, $function = 'sqrt'),
                'birth_date'            => $faker->dateTimeBetween('-30 years','-15 years')->format('Y-m-d'),
                'address'               => $faker->streetAddress,
                'details'               => $faker->text($maxNbChars = 200),
                'type_id'               => $faker->randomElement([4,5]),
            ));
        }

        for($i = 0; $i < 20; $i ++)
        {
            $id = \DB::table('states')->insertGetId(array(
                'description'   => 'Estado '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));

            $id = \DB::table('stages')->insertGetId(array(
                'description'   => 'Etapas '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));

            $id = \DB::table('actions')->insertGetId(array(
                'description'   => 'Acciones '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));

            $id = \DB::table('travels')->insertGetId(array(
                'description'   => 'Recorridos '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));

            $id = \DB::table('notifications')->insertGetId(array(
                'description'   => 'Notificaciones '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));

            $id = \DB::table('locations')->insertGetId(array(
                'description'   => 'Ubicacion '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));

            $id = \DB::table('specialities')->insertGetId(array(
                'description'   => 'Especialidad '.$id,
                'created_at'    => '0000-00-0 00:00:00',
                'updated_at'    => '0000-00-0 00:00:00',
            ));
        }

        for($i = 0; $i < 100; $i ++)
        {
            $id = \DB::table('offices')->insertGetId(array(
                'description'           => 'Despachos '.$id,
                'speciality_id'             => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                'location_id'             => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
            ));
        }

        for($i = 0; $i < 20; $i ++)
        {
            $id = \DB::table('processes')->insertGetId(array(
                'identification'        => $faker->unique()->swiftBicNumber,
                'identification_two'    => $faker->unique()->swiftBicNumber,
                'objective'             => $faker->text($maxNbChars = 200),
                'quantity'              => $faker->biasedNumberBetween($min = 1000000, $max = 90000000000, $function = 'sqrt'),
                'email'                 => $faker->unique()->email,
                'details'               => $faker->text($maxNbChars = 200),
                'action_id'             => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                'state_id'              => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                'stage_id'              => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                'travel_id'             => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                'municipality_id'       => 1,

            ));

            for($j = 2; $j < 10; $j ++)
            {
                \DB::table('process_actors')->insert(array(
                    'process_id'            => $id,
                    'part_id'               => $faker->randomElement([1,2]),
                    'user_id'               => $j,
                ));

                \DB::table('process_offices')->insert(array(
                    'process_id'            => $id,
                    'office_id'             => $j,
                    'stage_id'              => $faker->randomElement([1,2]),
                    'date'                  => $faker->date($format = 'Y-m-d', $max = 'now'),
                ));

                \DB::table('process_audiences')->insert(array(
                    'process_id'            => $id,
                    'date'                  => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'time'                  => $faker->time($format = 'H:i:s', $max = 'now'),
                    'office_id'             => $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
                ));

                \DB::table('process_movements')->insert(array(
                    'process_id'            => $id,
                    'description'           => $faker->text($maxNbChars = 200),
                    'date'                  => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'notification_date'     => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'expiration_date'       => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'office_id'             => $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
                    'notification_id'       => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                    'email'                 => $faker->unique()->email,
                ));

            }
        }



    }
}
