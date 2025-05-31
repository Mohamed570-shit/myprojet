<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\PrestataireController;

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.list');
Route::get('/prestataires', [PrestataireController::class, 'index'])->name('prestataires.list');


// les routes pour les clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.list');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
