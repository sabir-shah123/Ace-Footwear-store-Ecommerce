<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->string('gender', 100)->nullable();               //admin
            $table->string('cell');
            $table->string('country', 30)->nullable();
            $table->string('address', 300);
            $table->string('city', 25)->nullable();
            $table->integer('postal_code')->nullable();                    //user
            $table->string('role')->default('user')->nullable();      //admin
            $table->string('cnic', 100)->nullable();                 //admin
            $table->string('uphoto')->nullable();                          //admin

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
