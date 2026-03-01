<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
| EN: /  /services  /about  /contact   (no prefix — default language)
| AR: /ar/  /ar/services  /ar/about  /ar/contact
|--------------------------------------------------------------------------
*/

// ── English (no prefix) ─────────────────────────────────────────────────
Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/services',  [PageController::class, 'services'])->name('services');
Route::get('/about',     [PageController::class, 'about'])->name('about');
Route::get('/contact',   [PageController::class, 'contact'])->name('contact');

// ── Arabic (/ar/ prefix) ─────────────────────────────────────────────────
Route::prefix('ar')->group(function () {
    Route::get('/',         [PageController::class, 'home'])->name('ar.home');
    Route::get('/services', [PageController::class, 'services'])->name('ar.services');
    Route::get('/about',    [PageController::class, 'about'])->name('ar.about');
    Route::get('/contact',  [PageController::class, 'contact'])->name('ar.contact');
});
