<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/admin');
});

<<<<<<< HEAD
=======
// Route::get('/print',    [PdfController::class, 'print']);
>>>>>>> 6422f4358c6e9edf988d5ee4ab7d1b208384ef91
