<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\ProjetController;

Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('projets', ProjetController::class);
        Route::get('export', [ProjetController::class, 'export'])->name('projets.export');
        Route::post('import', [ProjetController::class, 'import'])->name('projets.import');
    });
});
