<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RescuedPersonController;
use App\Http\Controllers\Api\CommonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('rescued-people', RescuedPersonController::class);
Route::get('/common/public-numbers', [CommonController::class, 'public_numbers'])->name('common');


