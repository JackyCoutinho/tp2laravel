<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ForumArticleController;
use App\Http\Controllers\FichierController;
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
    return view('welcome');
})->name('home');

Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index')->middleware('auth');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create')->middleware('auth');
Route::post('/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store')->middleware('auth');
Route::get('/etudiant/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::get('/etudiant/{etudiant}/show', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');
Route::put('/etudiant/{etudiant}/update', [EtudiantController::class, 'update'])->name('etudiant.update')->middleware('auth');
Route::delete('/etudiant/{etudiant}/destroy', [EtudiantController::class, 'destroy'])->name('etudiant.destroy')->middleware('auth');


Route::get('/ville', [VilleController::class, 'index'])->name('ville.index')->middleware('auth');
Route::get('/ville/create', [VilleController::class, 'create'])->name('ville.create')->middleware('auth');
Route::post('/ville', [VilleController::class, 'store'])->name('ville.store')->middleware('auth');
Route::get('/ville/{ville}/edit', [VilleController::class, 'edit'])->name('ville.edit')->middleware('auth');
Route::get('/ville/{ville}/show', [VilleController::class, 'show'])->name('ville.show')->middleware('auth');
Route::put('/ville/{ville}/update', [VilleController::class, 'update'])->name('ville.update')->middleware('auth');
Route::delete('/ville/{ville}/destroy', [VilleController::class, 'destroy'])->name('ville.destroy')->middleware('auth');


Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/registration', [CustomAuthController::class, 'store']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('/forum', [ForumArticleController::class, 'index'])->name('forum.index')->middleware('auth');
Route::get('/forum/create', [ForumArticleController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/forum', [ForumArticleController::class, 'store'])->name('forum.store')->middleware('auth');
Route::get('/forum/{forumArticle}/edit', [ForumArticleController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('/forum/{forumArticle}/edit', [ForumArticleController::class, 'update'])->middleware('auth');
Route::get('/forum/{forumArticle}/show', [ForumArticleController::class, 'show'])->name('forum.show')->middleware('auth');
//Route::put('/forum/{forumArticle}/update', [ForumArticleController::class, 'update'])->name('forum.update');
Route::delete('/forum/{forumArticle}/destroy', [ForumArticleController::class, 'destroy'])->name('forum.delete')->middleware('auth');


Route::get('/file', [FichierController::class, 'index'])->name('file.index')->middleware('auth');
Route::get('file/create', [FichierController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('file', [FichierController::class, 'store'])->name('file.store')->middleware('auth');
Route::get('/file/{file}/edit', [FichierController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::delete('/file/{file}/destroy', [FichierController::class, 'destroy'])->name('file.destroy')->middleware('auth');
