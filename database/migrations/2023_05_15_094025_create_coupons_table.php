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
            $table->string('codice', 15)->primary();
            $table->string('usernameCliente', 30)->nullable(false);
            $table->foreign('usernameCliente')->references('username')->on('utenti');
            $table->bigInteger('idOfferta')->nullable(false)->unsigned();
            $table->foreign('idOfferta')->references('id')->on('offerte');
            $table->dateTime('dataOraCreazione')->default(DB::raw('CURRENT_TIMESTAMP'));
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
