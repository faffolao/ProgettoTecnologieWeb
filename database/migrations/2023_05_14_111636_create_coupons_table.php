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
        Schema::create('coupons', function (Blueprint $table) {
            $table->string('codice', 15)->nullable(false);
            $table->string('usernameCliente', 30)->nullable(false);
            $table->integer('idOfferta')->nullable(false);
            $table->dateTime('dataOraCreazione')->nullable(false);
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
        Schema::dropIfExists('coupons');
    }
};
