<?php

use App\Http\Controllers\API\EstimateController;
use App\Http\Controllers\API\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/items', [ItemController::class, 'index']);
Route::get('/estimates', [EstimateController::class, 'index']);
Route::get('/estimates/{id}', [EstimateController::class, 'show']);
Route::post('/estimates', [EstimateController::class, 'store']);



