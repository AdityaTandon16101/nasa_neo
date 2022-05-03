<?php

use App\Http\Controllers\NasaNeoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => inertia('Neo/Form'))->name('index');

Route::get('nasa-neo', [NasaNeoController::class, 'getNeoData'])->name('nasa.neo');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/auth.php';
