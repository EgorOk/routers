<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoyterController;

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

Route::post('/router', [RoyterController::class, 'create'])->name('router');

Route::get('/{router}', [RoyterController::class, 'open']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
