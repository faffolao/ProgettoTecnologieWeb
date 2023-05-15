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
        Schema::create('aziende', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->string('managerUsername', 30)->nullable(false);
            $table->string('managerUsername', 30);
            $table->foreign('managerUsername')->references('username')->on('utenti');
            $table->text('descrizione');
            $table->string('nome', 40)->unique()->nullable(false);
            $table->string('ragioneSociale', 50)->unique()->nullable(false);
            $table->binary('logo')->nullable(false);
            $table->string('tipologia', 30)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aziende');
    }
};
