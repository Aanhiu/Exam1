<?php

use App\Http\Controllers\GameController;
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

Route::prefix('/game')->name('game.')->group(function(){

    Route::get('/', [GameController::class, 'index'])->name('index');
    Route::get('/add', [GameController::class, 'add'])->name('add');
    Route::post('/add', [GameController::class, 'store'])->name('add');
    Route::get('/edit{item}', [GameController::class, 'edit'])->name('edit');
    Route::put('/edit{item}', [GameController::class, 'update'])->name('edit');
    Route::get('/delete{item}', [GameController::class, 'delete'])->name('delete');

});
