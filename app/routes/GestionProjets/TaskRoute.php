<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionTasks\TaskController;

// TODO : Commentaire : routage par Model

Route::middleware('auth')->group(function () {
    Route::prefix('/tasks')->group(function () {
        Route::resource('tasks', TaskController::class);
        Route::get('export', [TaskController::class, 'export'])->name('tasks.export');
        Route::post('import', [TaskController::class, 'import'])->name('tasks.import');
    });
});
