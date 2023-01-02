<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', function() {
    return view('welcome');
});
Route::get('/admin/dashboard', function() {
    return view('home');
})->name('home')->middleware('auth');

// Route::get('admin/pages', function() {
//     return view('admin.pages');
// })->name('pages')->middleware('auth');

// Route::get('admin/catalog', function() {
//     return view('admin/catalog');
// })->name('catalog')->middleware('auth');

// Catalog
Route::middleware('auth')->group(function() {
    Route::resource('/admin/catalog', CatalogController::class);
    // Route::get('admin/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    // Route::get('admin/tambah-produk', [CatalogController::class, 'create'])->name('catalog.create');
    // Route::post('admin/tambah-produk', [CatalogController::class, 'store'])->name('catalog.store');
    // Route::get('/admin/{id}/detail', [CatalogController::class, 'show'])->name('catalog.show');
});