<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/books', [BookController::class, 'books']);
    Route::get('/book/{id}', [BookController::class, 'book']);
    Route::post('/book', [BookController::class, 'store']);
    Route::match(['put', 'patch'], '/book/{id}', [BookController::class, 'update']);
    Route::delete('/book/{id}', [BookController::class, 'destroy']);
    Route::get('/books/search', [BookController::class, 'search']);
});
