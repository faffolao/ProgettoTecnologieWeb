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
            $table->string('managerUsername', 30)->nullable(false);
            $table->text('descrizione')->nullable();
            $table->string('nome', 40)->nullable(false);
            $table->string('ragioneSociale', 50)->nullable(false);
            $table->binary('logo')->nullable(false);
            $table->string('tipologia', 30)->nullable(false);
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
        Schema::dropIfExists('aziende');
    }
};
