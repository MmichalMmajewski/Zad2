<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EntriesController;
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
    return view('index');
})->name('category-index');

Route::get('/kategorie', [CategoriesController::class, 'index'])->name('category-all');
Route::get('/kategoria/{id}', [CategoriesController::class, 'show'])->name('category-single');
Route::get('/kategorie/edytuj/{id}', [CategoriesController::class, 'edit'])->name('category-edit');
Route::post('/kategorie/zapis', [CategoriesController::class, 'store'])->name('category-store');
Route::put('/kategorie/zmien/{id}', [CategoriesController::class, 'update'])->name('category-update');
Route::delete('/kategorie/usun/{id}', [CategoriesController::class, 'delete'])->name('category-delete');

Route::resource('wpisy', EntriesController::class, ['names' => 'entries']);
