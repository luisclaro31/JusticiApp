<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification')->unique();
            $table->string('professional_card')->nullable();
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('details')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('type_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
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
        Schema::drop('users');
    }
}
