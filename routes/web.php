<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrewMemberController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RescuedPersonController;
use App\Http\Controllers\RescueController;
use App\Http\Controllers\TravelController;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/langileak', [App\Http\Controllers\CrewMemberController::class, 'langileak'])->name('langileak');
    Route::resource('langileak', CrewMemberController::class);
    Route::resource('medikuak', DoctorController::class);
    Route::resource('erreskatatuak', RescuedPersonController::class);
    Route::resource('erreskateak', RescueController::class);
    Route::resource('bidaiak', TravelController::class);

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
