<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\ProjetController;
use App\Http\Controllers\GestionProjets\TagController;

// routes for project tags management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('tags', TagController::class);
        Route::get('tags/export', [TagController::class, 'export'])->name('tags.export');
        Route::post('tags/import', [TagController::class, 'import'])->name('tags.import');
    });
});
