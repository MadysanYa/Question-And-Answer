<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\TaskdetailController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/transfer', [TransferController::class, 'store']);
Route::post('/taskdetail', [TaskdetailController::class, 'store']);
Route::get('/taskdetail/{id}', [TaskdetailController::class, 'delete']);


Route::get('/district', [DistrictController::class,'district']);
Route::get('/commune', [CommuneController::class,'commune']);
Route::get('/village', [VillageController::class,'village']);
//Route::get('/transfer', [TransferController::class, 'store']);