<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $request = new Request();
        // \App\Models\User::factory(10)->create();
        DB::table('Aziende') -> insert(
            [
                'id' => 1,
                'managerUsername' => 'root',
                'descrizione' => 'Questa è la descrizione dell\'azienda',
                'nome' => 'Nome dell\'azienda',
                'ragioneSociale' => 'Ragione sociale dell\'azienda',
                'logo' => Storage::putFile('public', $request->file('logo')),
                'tipologia' => 'Tipologia dell\'azienda',
            ],

        );

        //Questa deve essere una delle ultime tabelle da riempire
        DB::table('Coupons') -> insert(
          [
            'codice' => 'codicetest',
            'usernameCliente' => 'GabrielP',
            'idOfferta' => 1,
            'dataOraCreazione', //completa dopo
          ],
        );

        DB::table('FAQs') -> insert(
            [
                'id' => 2,
                'usernameCreatore' => 'root',
                'domanda' => 'Come faccio ad applicare un coupon?',
                'risposta' => 'È sufficiente selezionare l\'offerta desiderata e cliccare sul tasto Genera coupon.
                               Per poter usufruire dei coupon è necessario aver effettuato il login (quindi essere
                               registrati sul nostro sito!)',
            ],
        );
    }
}
