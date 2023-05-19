<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Per caricare le immagini varie, ho bisogno di caricarle dal progetto.
        // Verranno poi trasformate in BLOB binari successivamente all'inserimento nel database.
        $huaweiLogo = file_get_contents(base_path("database/data/huawei.png"));
        $justEatLogo = file_get_contents(base_path("database/data/justeat.png"));

        $huaweiOffer = file_get_contents(base_path("database/data/offer_huawei.jpeg"));
        $justEatOffer = file_get_contents(base_path("database/data/offer_just_eat.jpeg"));

        // Creazione tabella Utenti.
        DB::table('utenti') -> insert([
            [
                'username' => 'root',
                'nome' => 'System',
                'cognome' => 'Administrator',
                'eta' => NULL,
                'genere' => NULL,
                'livello' => 3,
                'password' => Hash::make('root'),
                'telefono' => NULL,
                'email' => 'root@admin',
            ],
            [
                'username' => 'marco99',
                'nome' => 'Marco',
                'cognome' => 'Alessandrini',
                'eta' => 34,
                'genere' => 'M',
                'livello' => 1,
                'password' => Hash::make("ciao"),
                'telefono' => '7832891231',
                'email' => 'marcoaless99@gmail.com'
            ]
        ]);

        // Creazione tabella Aziende.
        DB::table('aziende') -> insert([
            [
                'id' => NULL,
                'managerUsername' => 'root',
                'descrizione' => 'Servizio online di food delivery, supportato da più di 2500 ristoranti in tutta Italia',
                'nome' => 'Just Eat',
                'ragioneSociale' => 'Just Eat',
                'logo' => $justEatLogo,
                'tipologia' => 'Cibo e Ristorazione'
            ],
            [
                'id' => NULL,
                'managerUsername' => 'root',
                'descrizione' => "É una società cinese impegnata nello sviluppo, produzione e commercializzazione di
                                 prodotti, di sistemi e di soluzioni di rete e telecomunicazioni, smartphones ed
                                 elettronica di consumo generale.",
                'nome' => 'Huawei',
                'ragioneSociale' => 'Huawei Tecnologies Corporation, Limited',
                'logo' => $huaweiLogo,
                'tipologia' => 'Informatica'
            ]
        ]);

        // Creazione tabella Offerte
        DB::table('offerte') -> insert([
            [
                'id' => NULL,
                'idAzienda' => 1,
                'nome' => '30% di sconto per 2 ordini',
                'oggetto' => 'Ottieni il 30% di sconto sul totale dei prossimi 2 ordini - Solo da Just Eat!',
                'modalitaFruizione' => "Inserire il codice del coupon nella sezione Inserisci sconto al momento dell'ordine sull'app.",
                'luogoFruizione' => "Utilizzabile solo sull'app Just Eat.",
                'dataOraCreazione' => now(),
                'dataOraScadenza' => '2024-01-01 10:15:00',
                'immagine' => $justEatOffer
            ],
            [
                'id' => NULL,
                'idAzienda' => 2,
                'nome' => 'Huawei P60 a prezzo stracciato!',
                'oggetto' => 'Ottieni il nuovo Huawei P60 scontato del 35%!',
                'modalitaFruizione' => 'Mostrare il codice generato dal coupon alla cassa al momento del pagamento.',
                'luogoFruizione' => 'Presso negozi e punti vendita certificati Huawei.',
                'dataOraCreazione' => now(),
                'dataOraScadenza' => '2024-01-01 10:15:00',
                'immagine' => $huaweiOffer
            ]
        ]);

        // Creazione tabella Coupons.
        DB::table('coupons') -> insert([
            [
                'codice' => 'W3FIV467KYU237',
                'usernameCliente' => 'marco99',
                'idOfferta' => 1,
                'dataOraCreazione' => '2023-02-12 14:15:26'
            ],
            [
                'codice' => '894GHO47843F3',
                'usernameCliente' => 'marco99',
                'idOfferta' => 2,
                'dataOraCreazione' => '2023-03-13 19:34:34'
            ]
        ]);

        // Creazione tabella FAQs.
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
    }
}
