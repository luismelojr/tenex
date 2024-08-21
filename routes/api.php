<?php

use App\Http\Controllers\Api\v1\CarnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/carner', [CarnerController::class, 'store'])->name('carner.store');
    Route::get('/carner/{carner}/installments', [CarnerController::class, 'getInstallments'])->name('carner.installments');
});
