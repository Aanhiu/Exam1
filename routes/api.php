<?php

use App\Http\Controllers\ApiGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/game')->name('game.')->group(function(){

    Route::get('/', [ApiGameController::class, 'index'])->name('index');
    Route::get('/{id}', [ApiGameController::class, 'show'])->name('show');
    Route::post('/', [ApiGameController::class, 'store'])->name('add');
    Route::put('/{item}', [ApiGameController::class, 'update'])->name('edit');
    Route::delete('/{item}', [ApiGameController::class, 'destroy'])->name('delete');

});
