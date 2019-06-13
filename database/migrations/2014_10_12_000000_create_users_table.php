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
            $table->string('name');
            $table->integer('target')->nullable(); // 1 - slabit / 2 -mentinere / 3 - pune masa 
            $table->integer('role')->default(0); // 0 - user / 1 - profesor / doctor / 2 - admin
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('language')->default('Romanian'); // Romanian / English
            $table->string('country')->nullable(); // sau 'Alta';
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->integer('gender')->nullable(); // 1 - barbat / 2 - femeie 
            $table->integer('age')->nullable(); // ani
            $table->integer('weight')->nullable(); // kg
            $table->integer('height')->nullable(); // cm
            $table->integer('lifestyle')->nullable(); // 1 - sedentar / 2 - normal / 3 - sportiv / 4 - atlet
            $table->string('password');
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
