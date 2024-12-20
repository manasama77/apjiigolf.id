<?php

use App\Http\Controllers\api\v1\MidtransController;
use App\Http\Controllers\DokuController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::post('doku/notification', [DokuController::class, 'notification']);
    Route::post('midtrans/notification', [MidtransController::class, 'notification']);
});

Route::post('doku/notification', [DokuController::class, 'notification']);
Route::post('midtrans/notification', [MidtransController::class, 'notification']);
