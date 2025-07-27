<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapsuleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/capsules', [CapsuleController::class, 'addCapsule']);

Route::get('/capsules/public', [CapsuleController::class, 'getAllPublicCapsules']);
