<?php

use App\Http\Controllers\FormationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
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

Route::get('/', [MainController::class, 'accueil'])->name('accueil');
Route::get('index', [FormationController::class, 'index']);
Route::get('ajout-produit', [FormationController::class, 'ajouterProduit']);
Route::get('ajout-produit-2', [FormationController::class, 'ajouterProduit2']);
Route::get('modification', [FormationController::class, 'updateProduit']);
Route::get('modification2', [FormationController::class, 'updateProduit2']);
Route::get('modification3/{id}', [FormationController::class, 'updateProduit3']);
Route::get('modification4/{produit}', [FormationController::class, 'updateProduit4']);
Route::get('suppression', [FormationController::class, 'supprimerProduit']);
Route::resource('produits', ProduitController::class);