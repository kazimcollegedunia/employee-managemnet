<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\Api\Admin\AdminController;

Route::get('/test', function () {
    return response()->json(['message' => 'API working!']);
});


Route::prefix('v1')->group(function () {
    Route::get('employees/search', [EmployeeController::class, 'search']);
    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('user', UsersController::class);

    //  Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('roles', [AdminController::class, 'roles']);
        Route::post('roles', [AdminController::class, 'createRole']);
        Route::get('permissions', [AdminController::class, 'permissions']);
        Route::post('permissions', [AdminController::class, 'createPermissions']);
        Route::get('modal', [AdminController::class, 'modal']);
        Route::post('modal', [AdminController::class, 'createModal']);
    });

});
