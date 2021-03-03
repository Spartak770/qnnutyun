<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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


Route::post('/users', [UserController::class, 'register']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}',[UserController::class, 'delete']);
Route::get('/users/{id}', [UserController::class, 'user_id']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/{id}', [PostController::class, 'view_post']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


