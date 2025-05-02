<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SubBranchController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',[TestController::class, 'test']);
Route::post('/create-branch',[BranchController::class,'create']);
Route::get('/get-all-branch',[BranchController::class,'get_all_branch']);
Route::get('/get-all-sub-branch', [SubBranchController::class, 'get_all_subBranch']);
