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
        Schema::create('coupons', function (Blueprint $table) {
            // Primary key della tabella.
            $table->string('codice', 15)->primary();

            // Foreign Keys -> puntano a Utenti(username) e Offerte(id) rispettivamente.
            $table->string('usernameCliente', 30);
            $table->bigInteger('idOfferta')->unsigned();

            // inserisco come data di default la data corrente, nel caso questo valore non dovesse essere riempito
            $table->dateTime('dataOraCreazione')->default(DB::raw('CURRENT_TIMESTAMP'));

            // definizione dei vincoli di FK
            $table->foreign('usernameCliente')->references('username')->on('utenti')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idOfferta')->references('id')
                ->on('offerte')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
