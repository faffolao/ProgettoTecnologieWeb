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
        Schema::create('Coupons', function (Blueprint $table) {
            $table->string('codice', 15)->primary();
//            $table->string('usernameCliente', 30)->nullable(false);
            $table->foreign('usernameCliente')->references('username')->on('Utenti');
//            $table->integer('idOfferta')->nullable(false);
            $table->foreign('idOfferta')->references('id')->on('Offerte');
            $table->dateTime('dataOraCreazione')->default(DB::raw('CURRENT_DATE'));
            $table->timestamps(); // generazione automatica di data ed ora di inserimento e modifica di una riga
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Coupons');
    }
};
