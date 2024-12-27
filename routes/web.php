<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;

// Rota para a página index
Route::get('/', function () {
    return view('index'); // Isso irá renderizar a view resources/views/index.blade.php
});

// Recursos para pessoas e contatos
Route::resource('people', PersonController::class);
Route::resource('contacts', ContactController::class);

// Middleware de autenticação para edição/exclusão
Route::group(['middleware' => 'auth'], function () {
    Route::get('contacts-per-country', [ContactController::class, 'contactsPerCountry'])->name('contacts.perCountry');
});

// Rotas de autenticação
Auth::routes();

// Rota para a página home após login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
