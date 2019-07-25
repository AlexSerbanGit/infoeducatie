<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginTokensTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'user_login_tokens';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this -> set_schema_table, function (Blueprint $table) {
            $table -> increments('id');
            $table -> unsignedInteger('user_id');
            $table -> longText('token');
            $table -> longText('user_agent');
            $table -> date('expire_date') -> nullable();
            $table -> double('latitude') -> nullable();
            $table -> double('longitude') -> nullable();
            $table -> string('ip', 190) -> nullable();
            $table -> tinyInteger('confirmed') -> default(false);
            $table -> string('sms_code') -> default(null);
            $table -> softDeletes();
            $table -> timestamps();

            $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this -> set_schema_table);
    }
}
