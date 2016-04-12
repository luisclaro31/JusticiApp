<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerdictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verdicts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification');
            $table->string('applicants');
            $table->string('defendants');
            $table->string('performance');
            $table->integer('municipality_id')->unsigned()->nullable();
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->integer('office_id')->unsigned()->nullable();
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
        Schema::drop('verdicts');
    }
}
