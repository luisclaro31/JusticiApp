<?php

use Illuminate\Database\Seeder;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('municipalities')->insert(array(
            'description'   => 'Barranquilla',
            'department'    => 'Atlantico',
        ));

        \DB::table('parts')->insert(array(
            'description'   => 'Demandante',
        ));

        \DB::table('parts')->insert(array(
            'description'   => 'Demandado',
        ));

        \DB::table('office_stages')->insert(array(
            'description'   => 'Origen',
        ));

        \DB::table('office_stages')->insert(array(
            'description'   => 'Conocimiento',
        ));
    }
}
