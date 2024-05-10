<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionTasks\TaskController;

// TODO : Commentaire : routage par Model

Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('tasks', TaskController::class);
        Route::get('tasks/export', [TaskController::class, 'export'])->name('tasks.export');
        Route::post('tasks/import', [TaskController::class, 'import'])->name('tasks.import');
    });
});
