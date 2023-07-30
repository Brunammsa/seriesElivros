<?php

use App\Http\Controllers\Api\ApiSeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCheckBoxController;
use App\Http\Controllers\Api\ApiTemporadasController;
use App\Http\Controllers\Api\ApiEpisodiosController;
use App\Http\Controllers\Api\ApiUploadController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('/series', ApiSeriesController::class);

    Route::post('/upload', [ApiUploadController::class, 'upload']);
    Route::get('/series/{serie}/temporadas', [ApiTemporadasController::class, 'show']);

    Route::get('/series/{serie}/episodios', [ApiEpisodiosController::class, 'show']);

    Route::patch('episodios/{episodio}', [ApiEpisodiosController::class, 'update']);
});

Route::controller(ApiCheckBoxController::class)->group(function(){
    Route::post('toggle/{serie}/toggle-done', 'toggle');
});

Route::post('/login', function(Request $request){
    $credenciais = $request->only(['email', 'password']);
    if (!Auth::attempt($credenciais)) {
        return response()->json('Unauthorized', 401);
    }
    // $user = User::whereEmail($credenciais['email'])
    //     ->first();

    // if (is_null($user) || !Hash::check($credenciais['password'], $user->password)) {
    //     return response()->json('Unauthorized', 401);
    // };
    $user = Auth::user();
    $user->tokens()->delete();
    $token = $user->createToken('token');
    
    return response()->json($token->plainTextToken);
});