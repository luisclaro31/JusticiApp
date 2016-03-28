<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade');
            $table->string('description');
            $table->date('date');
            $table->date('notification_date');
            $table->date('expiration_date');
            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->integer('notification_id')->unsigned();
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
            $table->string('email');
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
        Schema::drop('process_movements');
    }
}
