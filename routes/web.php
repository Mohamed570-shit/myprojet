<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


// Route des événements par type
Route::get('/evenements/par-type', [EvenementController::class, 'parType'])->name('evenements.parType');



// Route pour la page des événements par prestataire
Route::get('/evenements/par-prestataire', [EvenementController::class, 'parPrestataire'])->name('evenements.parPrestataire');
// Route API pour les requêtes Axios
Route::get('/api/evenements/par-prestataire/{prestataireId}', [EvenementController::class, 'eventparprestataire']);



// ... existing code ...
Route::get('/clients/reservationparclien', [ClientController::class, 'reservationparclien'])->name('clients.reservationparclien');
// ... existing code ...




// tach par evenement
Route::get('/evenements/taches', [EvenementController::class, 'tacheparev'])->name('evenements.tacheparev');



// Authentication Routes
Route::get('/dashboard/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Email Verification Routes
Route::get('/email/verify', [AuthController::class, 'verificationNotice'])->name('verification.notice');
Route::get('/email/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verification.verify');

// Password Reset Routes
Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/password/reset/{token}/{email}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Profile Routes
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::put('/password', [AuthController::class, 'updatePassword'])->name('password.change');
