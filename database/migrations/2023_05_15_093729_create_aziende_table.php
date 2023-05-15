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
            // Primary key auto-incrementata della tabella.
            $table->bigIncrements('id');

            $table->string('managerUsername', 30); // foreign key -> punta a Utenti(username)
            $table->text('descrizione');
            $table->string('nome', 40)->unique();
            $table->string('ragioneSociale', 50)->unique();
            $table->binary('logo');
            $table->string('tipologia', 30);

            // definizione del vincolo di FK
            $table->foreign('managerUsername')->references('username')->on('utenti');
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
