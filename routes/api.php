<?php

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

Route::get('users', function () {
    return new \Illuminate\Http\JsonResponse([
        'data' => 'users list',
    ]);
});

// implicit binding (eloquent model)
Route::get('/users/{user}', function (\App\Models\User $user) {
    return new \Illuminate\Http\JsonResponse([
        'data' => 'get user info',
    ]);
});

Route::post('users', function (\Illuminate\Http\Request $request) {
    return new \Illuminate\Http\JsonResponse([
        'data' => 'create a new user',
    ]);
});

Route::patch('/users/{user}', function (\App\Models\User $user, \Illuminate\Http\Request $request) {
    return new \Illuminate\Http\JsonResponse([
        'data' => 'patch user'
    ]);
});

Route::delete('/users/{user}', function (\App\Models\User $user) {
    return new \Illuminate\Http\JsonResponse([
        'data' => 'delete user'
    ]);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
