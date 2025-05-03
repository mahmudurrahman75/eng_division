<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SubBranchController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BranchMeasurementController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',[TestController::class, 'test']);

// Branch API
Route::post('/create-branch',[BranchController::class,'create']);
Route::get('/get-all-branch',[BranchController::class,'get_all_branch']);
Route::post('/update-branch/{id}', [BranchController::class, 'update']);
Route::delete('/delete-branch/{id}', [BranchController::class, 'delete']);

// Sub-Branch API
Route::post('/create-sub-branch', [SubBranchController::class, 'create']);
Route::get('/get-all-sub-branch', [SubBranchController::class, 'get_all_subBranch']);
Route::post('/update-sub-branch/{id}', [SubBranchController::class, 'update']);
Route::delete('/delete-sub-branch/{id}', [SubBranchController::class, 'delete']);

// Vendor API
Route::post('/create-vendor', [VendorController::class, 'create']);
Route::get('/get-all-vendors', [VendorController::class, 'get_all_vendor']);
Route::post('/update-vendor/{id}', [VendorController::class, 'update']);
Route::delete('/delete-vendor/{id}', [VendorController::class, 'delete']);

// Branch Measurement API
Route::post('/create-branch-measurement', [BranchMeasurementController::class, 'create']);
Route::get('/get-all-branch-measurement', [BranchMeasurementController::class, 'get_all_branch_measurement']);
Route::post('/update-branch-measurement/{id}', [BranchMeasurementController::class, 'update']);
Route::delete('/delete-branch-measurement/{id}', [BranchMeasurementController::class, 'delete']);

// Sub Branch Measurement API





