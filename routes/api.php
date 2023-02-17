<?php

use App\Admin\Controllers\CommuneController as ControllersCommuneController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\TaskdetailController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PropertyIndicatorController;
use App\Http\Controllers\PropertyAppraisalController;
use App\Http\Controllers\PropertyResearchController;

use App\Http\Controllers\PdfAppraisalController;
use App\Http\Controllers\PdfIndicatorController;



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
Route::get('/branch', [BranchController::class,'branch']);

Route::get('/verify_research/{id}/{value}', [PropertyResearchController::class,'verified']);
Route::get('/approve_research/{id}/{value}', [PropertyResearchController::class,'approved']);

Route::get('/verify_indicator/{id}/{value}', [PropertyIndicatorController::class,'verified']);
Route::get('/approve_indicator/{id}/{value}', [PropertyIndicatorController::class,'approved']);

//Route::get('/transfer', [TransferController::class, 'store']);

Route::get('/verify_appraisal/{id}/{value}', [PropertyAppraisalController::class,'verified']);
Route::get('/approve_appraisal/{id}/{value}', [PropertyAppraisalController::class,'approved']);
// Route::get('/print', [PdfController::class, 'print']);


// API for PDF Generation
Route::get('pdf', [PdfController::class, 'index']);
Route::get('google-autocomplete', [GoogleController::class, 'index']);

Route::get('pdfappraisal/{id}', [PdfAppraisalController::class, 'index']);
Route::get('pdfindicator/{id}', [PdfIndicatorController::class, 'index']);

Route::get('/qrcode', [QRCodeController::class, 'index']);