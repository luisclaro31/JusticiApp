<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification')->unique();
            $table->mediumText('objective')->nullable();
            $table->string('quantity')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('details')->nullable();
            $table->integer('action_id')->unsigned()->nullable();
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->integer('stage_id')->unsigned()->nullable();
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->integer('travel_id')->unsigned()->nullable();
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
            $table->integer('municipality_id')->unsigned()->nullable();
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
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
        Schema::drop('processes');
    }
}
