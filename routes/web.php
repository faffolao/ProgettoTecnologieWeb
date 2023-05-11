<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(); //per importare le rotte di autenticazione degli utenti

// Rotta per il caricamento della home page.
Route::view('/', 'homepage')
    ->name("homepage");

// Rotta per il caricamento della lista delle aziende.
Route::view("/aziende", 'aziende')
    ->name("aziende");

Route::view("/catalogo", 'catalogo')
    ->name("catalogo");