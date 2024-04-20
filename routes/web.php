<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ProfController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});

Route::get('createProf', function () {
    return view('createProf');
})->name('createProf');

Route::resource('eleve', EleveController::class);
Route::resource('profs', ProfController::class);
Route::resource('classe' ,ClassController::class);
Route::get('/pdf', [EleveController::class, 'creerPDF'])->name("pdf");
Route::controller(EleveController::class)->group(function () {
    Route::resource('eleves', EleveController::class) ;
    Route::get('classe/{slug}/eleves', 'index')->name('eleves.classe');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';