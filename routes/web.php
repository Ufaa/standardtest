<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    return view('welcome');
});

Route::get('/manage', [ContactController::class, 'index'])->name('index');
Route::get('/', [ContactController::class, 'add']);
Route::post('/', [ContactController::class, 'create']);
Route::get('/confirm', [ContactController::class, 'confirm']);
/*Route::resource('/', ContactController::class);
Route::get('/manage', [ContactController::class, 'delete']);
Route::post('/manage', [ContactController::class, 'remove']);*/
Route::get('/thanks', [ContactController::class, 'show']);
Route::post('/manage', [ContactController::class, 'search'])->name('search');
