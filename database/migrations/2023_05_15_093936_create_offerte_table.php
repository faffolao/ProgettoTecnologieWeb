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
        Schema::create('offerte', function (Blueprint $table) {
            // Primary key auto-incrementale della tabella.
            $table->bigIncrements('id');

            $table->bigInteger('idAzienda')->unsigned();    // foreign key -> punta a Aziende(id)
            $table->string('nome', 70);
            $table->text('oggetto');

            $table->text('modalitaFruizione');
            $table->text('luogoFruizione');

            // inserisco come data di default la data corrente, nel caso questo valore non dovesse essere riempito
            $table->dateTime('dataOraCreazione')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dataOraScadenza');
            $table->binary('immagine');

            // definizione dei vincoli della FK
            $table->foreign('idAzienda')->references('id')->on('aziende');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerte');
    }
};
