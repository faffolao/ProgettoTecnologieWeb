<?php

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

//Rotta per il POST del login
Route::post("user", [UserAuth::class, 'userLogin']);
// Rotta post login
Route::view("/profile", 'profile')
    ->name("profile");

// Rotta per il caricamento della pagina di Login.
Route::view("/login", 'login')
    ->name("login");

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

// Rotta di registrazione

Route::post('/registrazione', function(){
    User::create([
    'username' => request('username'),
    'nome' => request('nome'),
    'cognome' => request('cognome'),
    'data_nascita' => request('data_nascita'),
    'sesso' => request('sesso'),
    'livello' => request('livello'),
    'password' => request('password'),
    'telefono' => request('telefono'),
    'email' => request('email'),
    ]);
    return redirect('/login');
});

// Rotte per andare nella Home dopo il Login

/*

Route::post('/login', function () {
    $credentials = request(['username', 'password']);
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->livello == 1) {
            return redirect()->route('hubUtente');
        } else if ($user->livello == 2) {
            return redirect()->route('hubStaff');
        } else if ($user->livello == 3) {
            return redirect()->route('hubAmministratore');
        }
    }
    return redirect()->back()->withErrors([
        'username' => 'Le credenziali inserite non sono valide.',
    ])->withInput(request(['username']));
});

/* ??
 Route::get('/users/{username}', function ($username) {
    // check if user is level 1
    if (Auth::user()->level == 1) {
        // do something
    } else {
        return redirect('/');
    }
});

 * /
*/

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

//Rotta standard
Route::get("/modificaOfferte", [OfferController::class, 'getDataOff'])
    ->name("modificaOfferte");

// Rotta per inserire una nuova offerta
Route::view("/inserisciOfferte", 'inserisciOfferte')
    ->name('inserisciOfferte');
Route::post('/inserisciOfferte', [OfferController::class, 'addOff']);

//Rotta per agiornare un'offerta
Route::get('/aggiornaOfferte/{id}/edit', [OfferController::class, 'getDataSingleOff'])
    ->name('aggiornaOfferte');
Route::put('/aggiornaOfferte/{id}', [OfferController::class, 'updateDataSingleOff']);

//QUESTA ROTTA SERVER PER ELIMINARE UN'OFFERTA
Route::delete("/modificaOfferte/elimina/{id}", [OfferController::class, 'deleteR'])
    ->name("eliminaOfferte");

// Rotta per l'amministratore
Route::view("/hubAmministratore", 'hubAmministratore')
    ->name("hubAmministratore");



/* --------------------------
 * ROTTE F.A.Q
 * -------------------------- */
//Rotta standard
Route::get("/modificaFAQ", [FAQController::class, 'getData'])
    ->name("modificaFAQ");

//Rotta per inserire una f.a.q
Route::view("/inserisciFAQ", 'inserisciFAQ')
    ->name('inserisciFAQ');
Route::post('/inserisciFAQ', [FAQController::class, 'addFAQ']);

//Rotta per agiornare una domanda/risposta delle F.A.Q.
Route::get('/aggiornaFAQ/{id}/edit', [FAQController::class, 'getDataSingleFAQ'])
    ->name('aggiornaFAQ');
Route::put('/aggiornaFAQ/{id}', [FAQController::class, 'updateDataSingleFAQ']);

//QUESTA ROTTA SERVE PER ELIMINARE UNA DOMANDA/RISPOSTA
Route::delete("/modificaFAQ/elimina/{id}", [FAQController::class, 'deleteR'])
    ->name("eliminaFAQ");

/* --------------------------
 * ROTTE Cancellazione Clienti
 * -------------------------- */
Route::get("/cancellazioneClienti", [UserController::class, 'getDataClienti'])
    ->name("cancellazioneClienti");
/*Rotta per ricercare i clienti da eliminare*/
Route::post('/cancellazioneClienti', [UserController::class, 'getDataBR']);
Route::delete('cancellazioneClienti/{username}', [UserController::class, 'deleteC'])
    ->name('eliminaClienti');

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
