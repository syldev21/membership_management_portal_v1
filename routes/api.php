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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route for issuing access tokens
Route::post('/oauth/token', 'AccessTokenController@issueToken');

Route::get('/filtered-members', [\App\Http\Controllers\API\FilteredUserController::class, 'filteredUsers']);
Route::get('/users', [\App\Http\Controllers\API\FilteredUserController::class, 'users']);
