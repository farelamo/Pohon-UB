<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClusterController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\TreeTypeController;
use App\Http\Controllers\Api\TreeDetailController;

Route::get('cluster', [ClusterController::class, 'index']);
Route::get('cluster/{cluster:id}', [ClusterController::class, 'find']);
Route::get('location', [LocationController::class, 'index']);
Route::get('tree-type', [TreeTypeController::class, 'index']);
Route::get('tree-detail', [TreeDetailController::class, 'index']);
