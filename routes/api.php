<?php

use App\Http\Controllers\Api\ApiSeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCheckBoxController;
use App\Http\Controllers\Api\ApiUploadController;

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

Route::controller(ApiCheckBoxController::class)->group(function(){
    Route::post('toggle/{serie}/toggle-done', 'toggle');
});

Route::apiResource('/series', ApiSeriesController::class);

Route::post('/upload', [ApiUploadController::class, 'upload']);
