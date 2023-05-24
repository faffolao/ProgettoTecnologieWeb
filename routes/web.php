<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

//per database
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*********************************************************************/

Auth::user();
Auth::id();
Auth::check();
Auth::logout();

/* --------------------------
 * ROTTE PER LA NAVBAR
 * -------------------------- */

// Rotta per il caricamento della home page.
Route::get('/', [HomeController::class, 'index'])
    ->name('homepage');

// Rotta per il caricamento della lista delle aziende.
Route::get("/aziende", [FactoryController::class, 'getDataA'])
    ->name("aziende");
Route::post('/aziende', [FactoryController::class, 'getDataBR']);

// Rotta per il caricamento dei dettagli di un'azienda
Route::get("/dettagliAzienda/{nome}", [FactoryController::class, 'getDataDA'])
    ->name('dettagliAzienda');

// Rotta per il caricamento del catalogo corredato di lista delle offerte.
Route::get('/catalogo', [FactoryController::class, 'getDataC'])
    ->name('catalogo');
Route::post('/catalogo', [CatalogoController::class, 'getDataBR']);

/*
 * Route::get('/login', [
 *     'uses' => 'Auth\AuthController@getLogin',
 *     'as' => 'login'
 * ]);
 * Route::post('/login', [
 *     'uses' => 'Auth\AuthController@getLogin',
 *     'as' => 'login.post'
 * ]);
 * Route::group(['middleware' => 'auth'], function() {
 *     Route::get('/logout', [
 *     'uses' => 'Auth\AuthController@getLogout',
 *     'as' => 'logout'
 * ]);
 * });
 */

// Rotta per il caricamento della pagina di registrazione.

Route::view("/registrazione", 'registrazione')
    ->name("registrazione");
// Rotta di registrazione
Route::post('/registrazione', [RegistrationController::class, 'register'])
    ->name('registrazione');


// Rotta per il caricamento della pagina dei dettagli di un'offerta selezionata.
Route::get("/dettagliOfferta/{id}", [OfferController::class, 'getDataDO'])
    ->name("dettagliOfferta");

// Rotta per mostrare la pagina stampabile del coupon.
Route::get("/coupon/{id}", [CouponController::class, 'getDataNO'])
    ->name("coupon");

// Rotta per mostrare le FAQ

// Rotta per mostrare la lista del catalogo

// Rotta per mostrare l'elenco delle aziende

// Rotta per accedere all'area personale di un Cliente (utente di livello 1).
Route::view("/hubUtente", 'hubUtente')
    ->name("hubUtente");

// Rotta per accedere alla modifica dei dati personali (livello 1).
Route::view("/modificaDati_L1", 'modificaDati_L1')
    ->name("modificaDatiL1");

//Rout che ti fa visualizzare i coupon utilizzati
Route::get("/listaCouponUsati", [CouponController::class, 'getDataLCU'])
    ->name("listaCouponUsati");
//Rotta per ricercare i coupon
Route::post('/listaCouponUsati', [CouponController::class, 'getDataBRCU']);

// Rotta di registrazione
Route::post('/registrazione', [RegistrationController::class, 'register'])
    ->name('registrazione');

/* --------------------------
 * ROTTE CLIENTI
 * -------------------------- */

// Rotta per richiede una promozione



// Rotta per la modifica delle profilo

/*
Route::get('/modifica-credenziali', function () {
    return view('modifica-credenziali');
})->middleware(['auth', 'checkLevel']);
*/

// Rotta per lo staff
Route::view("/hubStaff", 'hubStaff')
    ->name("hubStaff");

//Rotta modifica dati personali (Livello 2)
Route::view("/modifcaDati_L2", 'modificaDati_L2')
    ->name("modificaDati_L2");

//Rotta standard
Route::get("/gestioneOfferte", [OfferController::class, 'getDataOff'])
    ->name("gestioneOfferte");
//Rotta per ricercare lo Staff da gestire
Route::post('/gestioneOfferte', [OfferController::class, 'getDataBRGO']);

// Rotta per inserire una nuova offerta
Route::get("/inserisciOfferte", [OfferController::class, 'getNomeAziende'])
    ->name('inserisciOfferte');
Route::post('/inserisciOfferte', [OfferController::class, 'addOff']);

//Rotta per agiornare un'offerta
Route::get('/aggiornaOfferte/{id}/edit', [OfferController::class, 'getDataSingleOff'])
    ->name('aggiornaOfferte');
Route::put('/aggiornaOfferte/{id}', [OfferController::class, 'updateDataSingleOff']);

//QUESTA ROTTA SERVER PER ELIMINARE UN'OFFERTA
Route::delete("/gestioneOfferte/elimina/{id}", [OfferController::class, 'deleteR'])
    ->name("eliminaOfferte");

// Rotta per l'amministratore
Route::view("/hubAmministratore", 'hubAmministratore')
    ->name("hubAmministratore");



/* --------------------------
 * ROTTE F.A.Q
 * -------------------------- */
//Rotta standard
Route::get("/gestioneFAQ", [FAQController::class, 'getData'])
    ->name("gestioneFAQ");

//Rotta per inserire una f.a.q
Route::view("/inserisciFAQ", 'inserisciFAQ')
    ->name('inserisciFAQ');
Route::post('/inserisciFAQ', [FAQController::class, 'addFAQ']);

//Rotta per agiornare una domanda/risposta delle F.A.Q.
Route::get('/aggiornaFAQ/{id}/edit', [FAQController::class, 'getDataSingleFAQ'])
    ->name('aggiornaFAQ');
Route::put('/aggiornaFAQ/{id}', [FAQController::class, 'updateDataSingleFAQ']);

//QUESTA ROTTA SERVE PER ELIMINARE UNA DOMANDA/RISPOSTA
Route::delete("/gestioneFAQ/elimina/{id}", [FAQController::class, 'deleteR'])
    ->name("eliminaFAQ");

/* --------------------------
 * ROTTE Cancellazione Clienti
 * -------------------------- */
Route::get("/cancellazioneClienti", [UserController::class, 'getDataClienti'])
    ->name("cancellazioneClienti");
/*Rotta per ricercare i clienti da eliminare*/
Route::post('/cancellazioneClienti', [UserController::class, 'getDataBRCC']);
Route::delete('cancellazioneClienti/{username}', [UserController::class, 'deleteC'])
    ->name('eliminaClienti');

/* --------------------------
 * ROTTE Gestione Staff
 * -------------------------- */
Route::get("/gestioneStaff", [UserController::class, 'getDataGS'])
    ->name("gestioneStaff");
/*Rotta per ricercare lo Staff da gestire*/
Route::post('/gestioneStaff', [UserController::class, 'getDataBRGS']);

//Rotta per inserire un membro dello staff
Route::view("/inserisciStaff", 'inserisciStaff')
    ->name('inserisciStaff');
Route::post('/inserisciStaff', [UserController::class, 'addStaff']);

//Rotta per agiornare un membro dello Staff
Route::get('/aggiornaStaff/{username}/edit', [UserController::class, 'getDataSingleStaff'])
    ->name('aggiornaStaff');
Route::put('/aggiornaStaff/{username}', [UserController::class, 'updateDataSingleStaff']);

//QUESTA ROTTA SERVE PER ELIMINARE UN MEMBRO DELLO STAFF
Route::delete("/gestioneStaff/elimina/{username}", [UserController::class, 'deleteS'])
    ->name("eliminaStaff");

/* --------------------------
 * ROTTE Gestione Aziende
 * -------------------------- */
Route::get("/gestioneAziende", [FactoryController::class, 'getDataGA'])
    ->name("gestioneAziende");
/*Rotta per ricercare l'azienda da gestire*/
Route::post('/gestioneAziende', [FactoryController::class, 'getDataBRGA']);

//Rotta per inserire un'azienda
Route::view("/inserisciAziende", 'inserisciAziende')
    ->name('inserisciAziende');
Route::post('/inserisciAziende', [FactoryController::class, 'addAzienda']);

//Rotta per agiornare un'azienda'
Route::get('/aggiornaAziende/{id}/edit', [FactoryController::class, 'getDataSingleAzienda'])
    ->name('aggiornaAziende');
Route::put('/aggiornaAziende/{id}', [FactoryController::class, 'updateDataSingleAzienda']);

//QUESTA ROTTA SERVE PER ELIMINARE UN'AZIENDA'
Route::delete("/gestioneAziende/elimina/{id}", [FactoryController::class, 'deleteA'])
    ->name("eliminaAziende");

/* --------------------------
 * ROTTE Gestione Aziende
 * -------------------------- */
Route::get("/statistiche", [StatsController::class, 'getData'])
    ->name('statistiche');

Route::post("/statistiche", [StatsController::class, 'getDataBR'])
    ->name('statistiche.ricerca');

Route::post('/statistiche/offerta', [StatsController::class, 'getOffertaCoupons'])
    ->name('statistiche.offerta');

Route::post('/statistiche/cliente', [StatsController::class, 'getClienteCoupons'])
    ->name('statistiche.cliente');

/*
Route::get('/gestioneFAQ','utenteController@gestioneFAQ')
    ->name("gestioneFAQ")
    ->middleware('can:isAdmin');

// Rotte get e post per modificare le FAQ
Route::get('/modifica_faq/{id}', 'utenteController@modificaFAQ')
    ->name("modificaFAQ")
    ->middleware('can:isAdmin');

Route::post('/modifica_faq/{id}', 'utenteController@modificaFAQ')
    ->name("modificaFAQ")
    ->middleware('can:isAdmin');

// Rotte get e post per eliminare le FAQ
Route::get('/elimina_faq/{id}', 'utenteController@eliminaFAQ')
    ->name("eliminaFAQ")
    ->middleware('can:isAdmin');

Route::post('/elimina_faq/{id}', 'utenteController@eliminaFAQ')
    ->name("eliminaFAQ")
    ->middleware('can:isAdmin');
*/

//Rotta per il controller user (lavoro database)
Route::get('UtentiDB', [UserController::class, 'getData']);
Route::get('OfferteDB', [OfferController::class, 'getData']);
Route::get('FAQsDB', [FAQController::class, 'getData']);
Route::get('CouponsDB', [CouponController::class, 'getData']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
*/
