<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;

Route::get('/test', function () {
    return response()->json(['message' => 'API working!']);
});



Route::apiResource('departments', DepartmentController::class);
Route::apiResource('employees', EmployeeController::class);

// Search employee
Route::get('employees/search', [EmployeeController::class, 'search']);
