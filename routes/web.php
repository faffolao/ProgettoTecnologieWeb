<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * ROTTE DI LIVELLO 0
 */

// Rotta per il caricamento della home page.
Route::get('/', [HomeController::class, 'index'])
    ->name('homepage');

// Rotta per il caricamento della lista delle aziende.
Route::get("/aziende", [FactoryController::class, 'getDataA'])
    ->name("aziende");
// Rotta per la ricerca di un'azienda dalla barra di ricerca apposita.
Route::post('/aziende', [FactoryController::class, 'getDataBR']);

// Rotta per il caricamento della pagina dei dettagli di un'azienda.
Route::get("/dettagliAzienda/{nome}", [FactoryController::class, 'getDataDA'])
    ->name('dettagliAzienda');

// Rotta per il caricamento del catalogo corredato di lista delle offerte.
Route::get('/catalogo', [FactoryController::class, 'getDataC'])
    ->name('catalogo');
Route::post('/catalogo', [CatalogoController::class, 'getDataBR']);

// Rotta per il caricamento della pagina dei dettagli di un'offerta selezionata.
Route::get("/dettagliOfferta/{id}", [OfferController::class, 'getDataDO'])
    ->name("dettagliOfferta");

/*
 * ROTTE DI LIVELLO 1
 */

Route::group(['middleware' => 'can:isUser'], function() {  //vincolo la funzionalità delle seguenti rotte
                                                           //ai soli utenti di livello 1
    // Rotta per mostrare la pagina stampabile del coupon.
    Route::get("/coupon/{id}", [CouponController::class, 'getDataNO'])
        ->name("coupon");

    // Rotta per accedere all'area personale del cliente.
    Route::view("/hubUtente", 'hubUtente')
        ->name("hubUtente");

    // Rotta per accedere alla modifica dei dati personali (livello 1).
    Route::get('/modificaDatiL1/{username}/edit', [UserController::class, 'getDatiPersonali1'])
        ->name('modificaDatiL1');
    // Rotta che aggiorna i dati.
    Route::put('/modificaDatiL1/{username}', [UserController::class, 'updateDatiPersonali1']);

    // Rotta che ti fa visualizzare i coupon utilizzati
    Route::get("/listaCouponUsati", [CouponController::class, 'getDataLCU'])
        ->name("listaCouponUsati");
    // Rotta per ricercare i coupon
    Route::post('/listaCouponUsati', [CouponController::class, 'getDataBRCU']);

});

/*
 *  ROTTE DI LIVELLO 2
 */

Route::group(['middleware' => 'can:isStaff'],function () {  //vincolo la funzionalità delle seguenti rotte
                                                            //ai soli utenti di livello 2
    // Rotta per caricare l'area personale dello staff.
    Route::view("/hubStaff", 'hubStaff')
        ->name("hubStaff");

    // Rotta per aprire la pagina della modifica dei dati personali per lo Staff.
    Route::get('/modificaDatiL2/{username}/edit', [UserController::class, 'getDatiPersonali2'])
        ->name('modificaDatiL2');
    // Rotta che aggiorna i dati.
    Route::put('/modificaDatiL2/{username}', [UserController::class, 'updateDatiPersonali2']);

    // Rotta per aprire la pagina per inserire una nuova offerta.
    Route::get("/inserisciOfferte", [OfferController::class, 'getNomeAziende'])
        ->name('inserisciOfferte');
    // Rotta per inserire una nuova offerta.
    Route::post('/inserisciOfferte', [OfferController::class, 'addOff']);

    // Rotta che apre la pagina per modificare un'offerta selezionata.
    Route::get('/aggiornaOfferte/{id}/edit', [OfferController::class, 'getDataSingleOff'])
        ->name('aggiornaOfferte');
    // Rotta che aggiorna una determinata offerta.
    Route::put('/aggiornaOfferte/{id}', [OfferController::class, 'updateDataSingleOff']);

    // Rotta che elimina una determinata offerta.
    Route::delete("/gestioneOfferte/elimina/{id}", [OfferController::class, 'deleteR'])
        ->name("eliminaOfferte");

});

// Rotta per aprire la pagina della gestione delle offerte.
Route::get("/gestioneOfferte", [OfferController::class, 'getDataOff'])
    ->name("gestioneOfferte");
// Rotta per la ricerca di un'offerta dall'apposito gestionale.
Route::post('/gestioneOfferte', [OfferController::class, 'getDataBRGO']);

/*
 * ROTTE DI LIVELLO 3
 */

Route::group(['middleware' => 'can:isAdmin'],function () {   //vincolo la funzionalità delle seguenti rotte
                                                             //al solo utente di livello  3
    // Rotta per aprire la home page dell'area personale dell'amministratore.
    Route::view("/hubAmministratore", 'hubAmministratore')
        ->name("hubAmministratore");

    // Rotta per l'apertura della pagina del gestionale delle FAQ.
    Route::get("/gestioneFAQ", [FAQController::class, 'getData'])
        ->name("gestioneFAQ");

    // Rotta per l'apertura della pagina per inserire una nuova FAQ.
    Route::view("/inserisciFAQ", 'inserisciFAQ')
        ->name('inserisciFAQ');
    // Rotta per inserire la FAQ.
    Route::post('/inserisciFAQ', [FAQController::class, 'addFAQ']);

    // Rotta per l'apertura della pagina per la modifica di una FAQ.
    Route::get('/aggiornaFAQ/{id}/edit', [FAQController::class, 'getDataSingleFAQ'])
        ->name('aggiornaFAQ');
    // Rotta per la modifica di una determinata FAQ.
    Route::put('/aggiornaFAQ/{id}', [FAQController::class, 'updateDataSingleFAQ']);

    // Rotta per cancellare una determinata FAQ.
    Route::delete("/gestioneFAQ/elimina/{id}", [FAQController::class, 'deleteR'])
        ->name("eliminaFAQ");

    // Rotta per l'apertura della pagina per la cancellazione di un cliente.
    Route::get("/cancellazioneClienti", [UserController::class, 'getDataClienti'])
        ->name("cancellazioneClienti");
    // Rotta che ricerca un cliente.
    Route::post('/cancellazioneClienti', [UserController::class, 'getDataBRCC']);
    // Rotta che elimina un cliente specifico.
    Route::delete('cancellazioneClienti/{username}', [UserController::class, 'deleteC'])
        ->name('eliminaClienti');

    // Rotta che apre la pagina per la gestione dello staff.
    Route::get("/gestioneStaff", [UserController::class, 'getDataGS'])
        ->name("gestioneStaff");
    // Rotta che ricerca un membro dello staff.
    Route::post('/gestioneStaff', [UserController::class, 'getDataBRGS']);

    // Rotta che apre la pagina per inserire un nuovo membro dello staff.
    Route::view("/inserisciStaff", 'inserisciStaff')
        ->name('inserisciStaff');
    // Rotta che inserisce lo staff.
    Route::post('/inserisciStaff', [UserController::class, 'addStaff']);

    // Rotta che apre la pagina per aggiornare un membro dello staff.
    Route::get('/aggiornaStaff/{username}/edit', [UserController::class, 'getDataSingleStaff'])
        ->name('aggiornaStaff');
    // Rotta che aggiorna effettivamente il membro dello staff.
    Route::put('/aggiornaStaff/{username}', [UserController::class, 'updateDataSingleStaff']);

    // Rotta che elimina un determinato membro dello staff.
    Route::delete("/gestioneStaff/elimina/{username}", [UserController::class, 'deleteS'])
        ->name("eliminaStaff");

    // Rotta che apre la pagina per la gestione delle aziende.
    Route::get("/gestioneAziende", [FactoryController::class, 'getDataGA'])
        ->name("gestioneAziende");
    // Rotta che ricerca un'azienda da gestire.
    Route::post('/gestioneAziende', [FactoryController::class, 'getDataBRGA']);

    // Rotta che apre la pagina per l'inserimento di una nuova azienda.
    Route::view("/inserisciAziende", 'inserisciAziende')
        ->name('inserisciAziende');
    // Rotta che aggiunge un'azienda.
    Route::post('/inserisciAziende', [FactoryController::class, 'addAzienda']);

    // Rotta che apre la pagina per modificare un'azienda.
    Route::get('/aggiornaAziende/{id}/edit', [FactoryController::class, 'getDataSingleAzienda'])
        ->name('aggiornaAziende');
    // Rotta che modifica un'azienda.
    Route::put('/aggiornaAziende/{id}', [FactoryController::class, 'updateDataSingleAzienda']);

    // Rotta che elimina un'azienda.
    Route::delete("/gestioneAziende/elimina/{id}", [FactoryController::class, 'deleteA'])
        ->name("eliminaAziende");

    // Rotta che carica la pagina delle statistiche.
    Route::get("/statistiche", [StatsController::class, 'getData'])
        ->name('statistiche');

    // Rotta che filtra gli utenti e le offerte nelle statistiche.
    Route::post("/statistiche", [StatsController::class, 'getDataBR'])
        ->name('statistiche.ricerca');

    // Rotta che restituisce un JSON che indica il numero di coupon emessi da un'offerta
    Route::post('/statistiche/offerta', [StatsController::class, 'getOffertaCoupons'])
        ->name('statistiche.offerta');

    // Rotta che restituisce un JSON che indica il numero di coupon emessi per un utente
    Route::post('/statistiche/cliente', [StatsController::class, 'getClienteCoupons'])
        ->name('statistiche.cliente');

});


/* Route::get('/', [PublicController::class, 'showCatalog1'])
        ->name('catalog1');

Route::get('/selTopCat/{topCatId}', [PublicController::class, 'showCatalog2'])
        ->name('catalog2');

Route::get('/selTopCat/{topCatId}/selCat/{catId}', [PublicController::class, 'showCatalog3'])
        ->name('catalog3');

Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin');

Route::get('/admin/newproduct', [AdminController::class, 'addProduct'])
        ->name('newproduct');

Route::post('/admin/newproduct', [AdminController::class, 'storeProduct'])
        ->name('newproduct.store');

Route::get('/user', [UserController::class, 'index'])
        ->name('user')->middleware('can:isUser'); */


require __DIR__.'/auth.php';
