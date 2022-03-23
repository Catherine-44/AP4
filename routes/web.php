<?php

use App\Http\Controllers\medecinController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
})->name("accueil");

// Route::get('/medecin', [medecinController::class, "index"])->name("medecin");
Route::get('/medecinnom', [medecinController::class, "recherchenom"])->name("medecinnom");
Route::get('/medecindep', [medecinController::class, "recherchedep"])->name("medecindep");
Route::get('/medecinspe', [medecinController::class, "recherchespe"])->name("medecinspe");

Route::get('/medecin/create', [medecinController::class, "create"])->name("medecin.create");
Route::post('/medecin/ajouter', [medecinController::class, "ajouter"])->name("medecin.ajouter");

Route::get('/medecin/{medecin}', [medecinController::class, "edit"])->name("medecin.edit");
Route::delete('/medecin/{medecin}', [medecinController::class, "delete"])->name("medecin.supprimer");
Route::put('/medecin/{medecin}', [medecinController::class, "update"])->name("medecin.update");

// Route::get('/medecindep', [departementController::class, "recherchedep"])->name("medecindep");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
