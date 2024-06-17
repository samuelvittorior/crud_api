<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\DosenController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    // Routes for Mahasiswa
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/read', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/read/{nim}', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'destroy']);

    // Routes for Makul
    Route::post('/makul/create', [MakulController::class, 'store']);
    Route::get('/makul/read', [MakulController::class, 'index']);
    Route::get('/makul/read/{kode_makul}', [MakulController::class, 'show']);
    Route::put('/makul/update/{kode_makul}', [MakulController::class, 'update']);
    Route::delete('/makul/delete/{kode_makul}', [MakulController::class, 'destroy']);

    // Routes for Dosen
    Route::post('/dosen/create', [DosenController::class, 'store']);
    Route::get('/dosen/read', [DosenController::class, 'index']);
    Route::get('/dosen/read/{nidn}', [DosenController::class, 'show']);
    Route::put('/dosen/update/{nidn}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{nidn}', [DosenController::class, 'destroy']);
});
