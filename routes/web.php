<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['query.mode'])->group(function () {
    Route::get('/Lab', [LabController::class, 'index']);
    Route::get('/Lab/about', [LabController::class, 'about']);
    Route::get('/Lab/status', [LabController::class, 'status']);
    Route::get('/Lab/echo/{text}', [LabController::class, 'echo']);
});

