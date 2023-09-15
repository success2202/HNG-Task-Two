<?php

use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('all/', [UserController::class, 'Index']);
Route::post('/create', [UserController::class, 'Store']);
Route::PUT('/update/{name}', [UserController::class, 'update']);
Route::get('/user/{name}', [UserController::class, 'show']);
Route::Patch('/delete/{name}',[UserController::class, 'delete']);



