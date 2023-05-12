<?php

use Illuminate\Support\Facades\Route;

//per database
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\CouponController;
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

//Auth::routes(); //per importare le rotte di autenticazione degli utenti

/* --------------------------
 * ROTTE PER LA NAVBAR
 * -------------------------- */

// Rotta per il caricamento della home page.
Route::get('/', [FAQController::class, 'getData'])
    ->name('homepage');
//Route::view('/', 'homepage') //Così strutturata, la rende la pagina che si apre di default
//    ->name("homepage");

// Rotta per il caricamento della lista delle aziende.
Route::view("/aziende", 'aziende')
    ->name("aziende");

// Rotta per il caricamento del catalogo corredato di lista delle offerte.
Route::get('/catalogo', [FactoryController::class, 'getData'])
    ->name('catalogo');

//Rotta per il POST del login
Route::post("user", [UserAuth::class, 'userLogin']);
// Rotta post login
Route::view("/profile", 'profile')
    ->name("profile");

// Rotta per il caricamento della pagina di Login.
Route::view("/login", 'login')
    ->name("login");

// Rotta per mostrare le FAQ

// Rotta per mostrare la lista del catalogo

// Rotta per mostrare l'elenco delle aziende

// Rotte per gli utenti
Route::view("/hubUtente", 'hubUtente')
    ->name("hubUtente");

// Rotta per andare nella Home dopo il Login

// Rotta per richiede una promozione

// Rotta per la gestione del profilo

// Rotta per lo staff

// Rotta per inserire una nuova offerta

// Rotta per l'amministratore



/*
// Rotte per le faq

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
//Route::get('users', [UserController::class, 'index']);
Route::get('UtentiDB', [UserController::class, 'getData']);
Route::get('OfferteDB', [OfferController::class, 'getData']);
Route::get('FAQsDB', [FAQController::class, 'getData']);
Route::get('CouponsDB', [CouponController::class, 'getData']);
//Route::get('list', [FactoryController::class, 'show']);
