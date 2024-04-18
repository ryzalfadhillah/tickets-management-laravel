<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:sanctum', 'api.key']], function () use ($router) {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/create-user', [UserController::class, 'store']);
    Route::put('/update-user', [UserController::class, 'update']);
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);

    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/buy-ticket', [TicketController::class, 'store']);
});

Route::post('/login', [AuthController::class, 'login']);
