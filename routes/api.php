<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TestController;
use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\ResultController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\UserAnswerController;

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

Route::POST('/login',[ AuthController::class, 'login']);
Route::POST('/logout',[ AuthController::class, 'logout']);

Route::GET('/question',[ QuestionController::class, 'index']);
Route::GET('/answer',[ AnswerController::class, 'index']);

Route::GET('/result',[ ResultController::class, 'index']);
Route::GET('result/show-by-user',[ ResultController::class, 'showResultByUser']);
Route::GET('result/exist-or-not',[ ResultController::class, 'checkResultExistOrNot']);
Route::POST('result/create',[ ResultController::class, 'store']);


Route::GET('/user-answer',[ UserAnswerController::class, 'index']);
Route::POST('/user-answer',[ UserAnswerController::class, 'store']);
Route::PUT('/user-answer/{id}',[ UserAnswerController::class, 'update']);
Route::DELETE('/user-answer/{id}',[ UserAnswerController::class, 'destroy']);

Route::GET('/test',[ TestController::class, 'index']);
Route::GET('/test/{id}',[ TestController::class, 'show']);
