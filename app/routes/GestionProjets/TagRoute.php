<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\ProjetController;

// routes for project tags management
Route::middleware('auth')->group(function () {
    Route::prefix('/projets')->group(function () {
        Route::resource('tags', ProjetController::class);
        Route::get('tags/export', [ProjetController::class, 'export'])->name('tags.export');
        Route::post('tags/import', [ProjetController::class, 'import'])->name('tags.import');
    });
});
