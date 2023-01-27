<?php
/** Code By HAMDAN */
use Hamdan\Controllers\ProcessController;

Route::get('/admin/dashboard', [ProcessController::class,'getGenerator'])->name('generator');
Route::post('process', [ProcessController::class,'postGenerator'])->name('postGenerator');
