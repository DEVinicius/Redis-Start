<?php

use App\Employee\Infra\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/', [EmployeeController::class, "create"]);
Route::get('/{userId}', [EmployeeController::class, "get"]);
