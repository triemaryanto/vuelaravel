<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\WilayahController;

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

Route::get('datawilayah', [WilayahController::class, 'index']);
Route::get('dataanggota', [AnggotaController::class, 'index']);
Route::get('adminhome', [AdminController::class, 'index']);
Route::get('validatelogin', [AdminController::class, 'validatelogin']);

Route::apiResources([
    'anggota' => AnggotaController::class,
]);
