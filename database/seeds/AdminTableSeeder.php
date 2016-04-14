<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('types')->insert(array(
            'description'   => 'Administrador',
            'created_at'    => '0000-00-0 00:00:00',
            'updated_at'    => '0000-00-0 00:00:00',
        ));

        \DB::table('types')->insert(array(
            'description'   => 'Abogados',
            'created_at'    => '0000-00-0 00:00:00',
            'updated_at'    => '0000-00-0 00:00:00',
        ));

        \DB::table('types')->insert(array(
            'description'   => 'Persona Natural',
            'created_at'    => '0000-00-0 00:00:00',
            'updated_at'    => '0000-00-0 00:00:00',
        ));

        \DB::table('types')->insert(array(
            'description'   => 'Persona Juridica',
            'created_at'    => '0000-00-0 00:00:00',
            'updated_at'    => '0000-00-0 00:00:00',
        ));

        \DB::table('users')->insert(array(
            'identification'    => '0000000001',
            'professional_card' => '0000000001',
            'full_name'         => 'Administrador',
            'email'             => 'admin',
            'password'          => \Hash::make('admin'),
            'type_id'           => '1',
        ));
    }
}
