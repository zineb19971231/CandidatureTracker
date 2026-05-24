<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\EntretiensController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [CandidatureController::class, 'dashboard'])
        ->name('dashboard');
        // Routes des candidatures
    Route::get('/candidature/index', [CandidatureController::class, 'index'])
        ->name('candidature.index');
    Route::get('/candidature/create', [CandidatureController::class, 'create'])
        ->name('candidature.create');
    Route::post('/candidature', [CandidatureController::class, 'store'])
        ->name('candidature.store');
    Route::get('/candidature/{candidature}', [CandidatureController::class, 'show'])
        ->name('candidature.show');
    Route::get('/candidature/{candidature}/edit', [CandidatureController::class, 'edit'])
        ->name('candidature.edit');
    Route::put('/candidature/{candidature}', [CandidatureController::class, 'update'])
        ->name('candidature.update');
    Route::delete('/candidature/{candidature}', [CandidatureController::class, 'destroy'])
        ->name('candidature.destroy');
        //Route des entretiens 
   Route::resource('entretiens', EntretiensController::class);

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
