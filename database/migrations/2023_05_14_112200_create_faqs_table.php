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
            $table->bigIncrements('id')->nullable(false);
            $table->string('usernameCreatore', 30)->nullable(false);
            $table->string('domanda', 300)->nullable(false);
            $table->string('risposta', 300)->nullable(false);
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
        Schema::dropIfExists('faqs');
    }
};
