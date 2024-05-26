<?php

use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// crud user
Route::prefix('v1')->group(function () {
    Route::get('/get/users', [UserController::class, 'index']);
    Route::get('/get/user/{id}', [UserController::class, 'show']);
    Route::post('/create/user', [UserController::class, 'store']);
    Route::post('/update/user/{id}', [UserController::class, 'update']);
    Route::delete('/delete/user/{id}', [UserController::class, 'softDelete']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
