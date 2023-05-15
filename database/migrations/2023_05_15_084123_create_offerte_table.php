<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('Offerte', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->foreign('idAzienda')->references('id')->on('Aziende');
            $table->string('nome', 70)->nullable(false);
            $table->text('oggetto')->nullable(false);
            $table->text('modalitaFruizione')->nullable(false);
            $table->dateTime('dataOraCreazione')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dataOraScadenza')->nullable(false);
            $table->text('luogoFruizione')->nullable(false);
            $table->binary('immagine')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Offerte');
    }
};
