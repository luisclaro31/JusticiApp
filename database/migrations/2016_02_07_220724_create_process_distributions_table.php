<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('process_id')->unsigned();
            $table->timestamps();
            $table->foreign('process_id')
                ->references('id')
                ->on('processes')
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
        Schema::drop('process_distributions');
    }
}
