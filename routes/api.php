<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;
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
Route::group(['prefix' => 'auth'], function () {
  Route::get('/semester', [AuthController::class, 'semester']);
  Route::post('login', [AuthController::class, 'login']);
  Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);
    Route::post('user', [AuthController::class, 'update_user']);
    Route::post('users/generate', [AuthController::class, 'generate']);
    Route::get('users/list', [AuthController::class, 'list']);
    Route::post('user/delete', [AuthController::class, 'hapus']);
    Route::post('user/detil', [AuthController::class, 'detil']);
    Route::post('user/reset-password', [AuthController::class, 'reset_password']);
    Route::post('user/foto', [AuthController::class, 'foto']);
    Route::post('user/ganti-password', [AuthController::class, 'ganti_password']);
    Route::post('user/update-role', [AuthController::class, 'update_role']);
  });
});
Route::group(['middleware' => 'auth:sanctum'], function () {
  Route::group(['prefix' => 'dashboard'], function () {
    Route::post('/', [DashboardController::class, 'index']);
    Route::post('/wilayah', [DashboardController::class, 'get_wilayah']);
  });
  Route::group(['prefix' => 'datatables'], function () {
    Route::get('/', [DatatableController::class, 'index']);
    Route::post('/', [DatatableController::class, 'insert']);
    Route::delete('/{data}/{id}', [DatatableController::class, 'destroy']);
  });
});
