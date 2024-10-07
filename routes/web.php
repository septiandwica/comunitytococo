<?php

use App\Http\Controllers\ContributionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;


Route::get('/sl', function () {
    return view('contribution');
});
Route::get('/', [FormController::class, 'create'])->name('form.create');
Route::post('/submit', [FormController::class, 'store'])->name('form.store');

Route::get('/contribution/{id}', [ContributionController::class, 'showContribution'])->name('contribution.show');