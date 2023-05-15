<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
//            $table->string('usernameCreatore', 30)->nullable(false);
            $table->foreign('usernameCreatore')->references('username')->on('Utenti');
            $table->string('domanda', 300)->unique()->nullable(false);
            $table->string('risposta', 300)->unique()->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
};
