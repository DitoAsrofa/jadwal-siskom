<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataDosenController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('schedules', [HomeController::class, 'apiGetAllSchedules']);
Route::get('schedules/{id}', [HomeController::class, 'apiGetScheduleById']);
Route::post('schedules', [HomeController::class, 'apiCreateSchedule']);
Route::put('schedules/{id}', [HomeController::class, 'apiUpdateSchedule']);
Route::delete('schedules/{id}', [HomeController::class, 'apiDeleteSchedule']);

Route::get('dosen', [DataDosenController::class, 'apiIndex']);
Route::get('dosen/{id}', [DataDosenController::class, 'apiShow']);
Route::post('dosen', [DataDosenController::class, 'apiStore']);
Route::put('dosen/{id}', [DataDosenController::class, 'apiUpdate']);
Route::delete('dosen/{id}', [DataDosenController::class, 'apiDestroy']);
