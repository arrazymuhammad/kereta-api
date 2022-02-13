<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeretaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::controller(KeretaController::class)->group(function () {
        Route::get('kereta', 'index');
        Route::post('kereta', 'store');
        Route::get('kereta/{id}', 'show');
        Route::put('kereta/{id}', 'update');
        Route::delete('kereta/{id}', 'delete');
    });
});
