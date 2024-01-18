<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SectionController;

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

Route::get('/', [SectionController::class, 'index'])->name('home');
Route::get('/{section}', [ArticleController::class, 'showBySection'])->name('articles.showBySection');
Route::post('/{section}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::post('/{section}/store', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/{section}/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');






