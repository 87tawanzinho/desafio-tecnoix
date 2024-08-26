<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::post('/books', [BookController::class, 'store']);
Route::get('/books',  [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/replies/{support_id}', [ReplySupportApiController::class, 'getRepliesFromSupport']);
    Route::post('/replies/{support_id}', [ReplySupportApiController::class, 'createNewReply']);
    Route::delete('/replies/{id}', [ReplySupportApiController::class, 'destroy']);

    Route::apiResource('/supports', SupportController::class);
});
// Route::apiResource('/supports', SupportController::class)->middleware('auth');
