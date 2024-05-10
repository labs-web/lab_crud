<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\ProjetController;

// routes for project management

Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('projets', ProjetController::class);
        Route::get('projets/export', [ProjetController::class, 'export'])->name('projets.export');
        Route::post('projets/import', [ProjetController::class, 'import'])->name('projets.import');
    });
});
