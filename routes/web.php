<?php

use App\Http\Controllers\MainController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [MainController::class, 'show']);
Route::get('/admin', [MainController::class, 'index'])->name('admin');
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/services', [PagesController::class, 'services']);
Route::get('/portfolio', [PagesController::class, 'portfolio']);
Route::get('/update', [MainController::class, 'update'])->name('change');
Route::post('/update', [MainController::class, 'update'])->name('update');