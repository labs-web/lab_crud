<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\ProjetController;

Route::prefix('Projets')->group(function () {
   Route::resource('projets', ProjetController::class);
    Route::get('export', [ProjetController::class, 'export'])->name('projets.export');
    Route::post('import', [ProjetController::class, 'import'])->name('projets.import');
});

