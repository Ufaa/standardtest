<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

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

//問い合わせページ
Route::get('/', [ContactController::class, 'show']);
Route::post('/post', [ContactController::class, 'post'])->name('post');

//確認ページ
Route::get('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/confirm', [ContactController::class, 'send'])->name('send');

//完了ページ
Route::get('/thanks', [ContactController::class, 'complete'])->name('complete');


//管理ページ
Route::get('/manage', [ContactController::class, 'index'])->name('index');
Route::post('/search', [ContactController::class, 'search'])->name('search');
Route::post('/delete', [ContactController::class, 'delete'])->name('delete');
Route::post('/destroy', [ContactController::class, 'destroy'])->name('destroy');



