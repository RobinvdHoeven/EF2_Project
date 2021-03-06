<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


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
    return redirect('/images');
});

Route::get('/images', [ImageController::class, 'create']);
Route::get('/images/{id}', [ImageController::class, 'show'])->name('image.show');
Route::post('/images/store', [ImageController::class, 'store'])->name('image.store');
Route::post('images/delete/{id}', [ImageController::class, 'delete'])->name('image.delete');
Route::post('/images/rotateleft', [ImageController::class, 'rotateLeft'])->name('rotate.left');
Route::post('/images/rotateright', [ImageController::class, 'rotateRight'])->name('rotate.right');
