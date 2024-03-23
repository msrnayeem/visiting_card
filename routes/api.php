<?php

use App\Http\Controllers\API\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/generate-card', [CardController::class, 'generate'])
    ->middleware(['auth:sanctum', 'permission:create', 'permission:read']);
Route::delete('/card/delete/{id}', [CardController::class, 'delete'])->middleware('auth:sanctum')->middleware('permission:delete');

Route::post('/search', [CardController::class, 'searchByIdentifier'])->middleware('auth:sanctum')->middleware('permission:read');
Route::get('/all-cards', [CardController::class, 'allCards'])->middleware('auth:sanctum')->middleware('permission:read');



