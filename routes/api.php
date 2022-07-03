<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\employeeDataController;

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

Route::get('/employees/countries', [employeeDataController::class, 'getCountries'])->name('getCountries');
Route::get('/employees/{countries}/state', [employeeDataController::class, 'getState'])->name('getState');
Route::get('/employees/{states}/city', [employeeDataController::class, 'getCity'])->name('getCity');
