<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Comando per avviare la migration:
        //  $ php artisan migrate:refresh
        //  $ php artisan migrate
        // Comando per caricare i dati sottostanti:
        //  $ php artisan db:seed

        DB::table('utenti') -> insert(
            [
                'username' => 'root',
                'nome' => 'System',
                'cognome' => 'Administrator',
                'eta' => NULL,
                'genere' => NULL,
                'livello' => 3,
                'password' => 'root',
                'telefono' => NULL,
                'email' => 'root@admin',
            ]
        );

        DB::table('faqs') -> insert([
            [
                'id' => NULL,
                'usernameCreatore' => 'root',
                'domanda' => 'Come faccio ad applicare un coupon?',
                'risposta' => 'È sufficiente selezionare l\'offerta desiderata e cliccare sul tasto Genera coupon.
                               Per poter usufruire dei coupon è necessario aver effettuato il login (quindi essere
                               registrati sul nostro sito!)'
            ],
            [
                'id' => NULL,
                'usernameCreatore' => 'root',
                'domanda' => "L'uso di Offertopoli è gratuito oppure è necessario pagare un abbonamento per usare i coupon?",
                'risposta' => 'Si, Offertopoli è gratuito, tutti i coupon contenuti sono liberamente e gratuitamente utilizzabili.'
            ]
        ]);

//        DB::table('aziende') -> insert(
//            [
//                [
//                    'id' => 5,
//                    'managerUsername' => 'root',
//                    'descrizione' => 'Una tra le migliori aziende che produce elettrodomestici tra cui:
//                                   aspirapolvere; ventilatori e asciugacapelli ',
//                    'nome' => 'Dyson',
//                    'ragioneSociale' => 'Dyson S.R.L.',
//                    'logo' => Storage::putFile('public', $request->file('logo')),
//                    'tipologia' => 'multinazionale',
//                ],
//                [
//                    'id' => 6,
//                    'managerUsername' => 'root',
//                    'descrizione' => 'Una tra le migliori aziende che produce elettrodomestici tra cui:
//                                   aspirapolvere; ventilatori e asciugacapelli ',
//                    'nome' => 'Dyson',
//                    'ragioneSociale' => 'Dyson S.R.L.',
//                    'logo' => Storage::putFile('public', $request->file('logo')),
//                    'tipologia' => 'multinazionale',
//                ]
//            ]
//
//        );
//
//        //Questa deve essere una delle ultime tabelle da riempire
//        DB::table('coupons') -> insert(
//            [
//                'codice' => 'codicetest',
//                'usernameCliente' => 'GabrielP',
//                'idOfferta' => 1,
//                'dataOraCreazione', //completa dopo
//            ],
//        );
//
//
    }
}
