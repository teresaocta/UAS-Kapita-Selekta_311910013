<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BestController;
use App\Http\Controllers\Controller;

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

// Route::get('/', function() {return view('buku');});

Route::get('/', [Controller::class, 'histo']);

Route::get('/list', [BukuController::class, 'getBuku'])->name('list');

Route::get('/best', [BestController::class, 'getBuku']);

Route::get('/searchlist/{judul}', [BukuController::class, 'searchBuku'])->name('searchlist');

Route::get('/searchlistbest/{judul}', [BestController::class, 'searchBuku'])->name('searchlistbest');

Route::get('/search', [BukuController::class, 'goSearchBuku']);

Route::get('/searchbest', [BestController::class, 'goSearchBuku']);

Route::get('/morebuku/{id}', [BukuController::class, 'getRekomendasi']);

Route::get('/morebest/{id}', [BestController::class, 'getRekomendasi']);
