<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('speciality_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->timestamps();
            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialities')
                ->onDelete('cascade');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offices');
    }
}
