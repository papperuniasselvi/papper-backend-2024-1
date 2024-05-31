<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tasks')->name('tasks')->group(function () {
    Route::post("/", [\App\Http\Controllers\TaskController::class, 'create'])->name('.create');
});
