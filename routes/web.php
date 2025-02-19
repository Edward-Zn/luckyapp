<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/link/{token}', [UserController::class, 'showPageA']);
Route::post('/link/{token}/new', [UserController::class, 'generateNewLink']);
Route::post('/link/{token}/deactivate', [UserController::class, 'deactivateLink']);

Route::get('/lucky', [UserController::class, 'imFeelingLucky']);