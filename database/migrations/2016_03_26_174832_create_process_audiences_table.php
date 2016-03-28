<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_audiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('process_audiences');
    }
}
