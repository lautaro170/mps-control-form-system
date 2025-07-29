<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::patch('forms/{form}/complete', [\App\Http\Controllers\FormController::class, 'completeForm'])
        ->name('forms.complete-form');

    Route::patch('forms/{form}/update-json-value', [\App\Http\Controllers\FormController::class, 'updateFormJsonValue'])
        ->name('forms.update-form-json-value');
});
