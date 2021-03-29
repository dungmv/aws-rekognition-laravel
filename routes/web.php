<?php

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

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;

Route::get('/', [PhotosController::class, 'index'])->name('index');
Route::post('/', [PhotosController::class, 'analyze'])->name('analyze');
Route::resource('collections', CollectionController::class);
Route::post('collections/{id}/faces', [CollectionController::class, 'addFaces'])->name('collections.faces.add');
