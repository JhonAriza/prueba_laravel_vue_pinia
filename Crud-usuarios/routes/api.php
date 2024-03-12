<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;


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

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
  Route::get('/users', [UserController::class, 'index'])->name('index');
  Route::post('/users', [UserController::class, 'store'])->name('store');
  Route::get('/users/{id}', [UserController::class, 'show'])->name('show');
  Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('edit');
  Route::post('/users/{id}', [UserController::class, 'update'])->name('update');
  Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('destroy');