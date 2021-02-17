<?php

use App\User\Infra\Http\Controllers\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/', [SessionController::class, "login"]);
Route::post('/create', [SessionController::class, "signIn"]);
