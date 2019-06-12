<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_progresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('protein')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbo')->nullable();
            $table->integer('kcal')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('daily_progresses');
    }
}
