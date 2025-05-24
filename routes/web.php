<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccueilController;
use App\Models\Accueil;
use Illuminate\Support\Facades\Route;



//la gestion des utilisateurs
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('categories', CategorieController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('emplacements',EmplacementController::class);
Route::resource('articles', ArticleController::class);
Route::resource('factures', FactureController::class);
Route::resource('accueil', AccueilController::class);
Route::get('/', [App\Http\Controllers\AccueilController::class, 'index'])->name('accueil');

// Route::get('/factures/{id}/pdf', [FactureController::class, 'genererPdf'])->name('factures.pdf');


// Route::get('/', function () {
//     return view('welcome');
// });
