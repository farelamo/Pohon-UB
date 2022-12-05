<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TreeTypeController;
use App\Http\Controllers\Admin\TreeDetailController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ClusterController;

// Auth
Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::prefix('/admin')->group(function () {
    // Admin Page
    Route::resource('/', DashboardController::class);
    Route::resource('/type', TreeTypeController::class);
    Route::resource('/tree', TreeDetailController::class);
    Route::resource('/location', LocationController::class);
    Route::resource('/cluster', ClusterController::class);
    Route::put('/cluster/{id}/update/image', [ClusterController::class, 'updateImage']);
    Route::put('/type/{id}/update/image', [TreeTypeController::class, 'updateImage']);
});
