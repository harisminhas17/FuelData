<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuelDashboardController;


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

Route::get('/fuel-quantity', [FuelDashboardController::class, 'barCharts']);
Route::get('/line_charts_bars',[FuelDashboardController::class,'lineCharts']);
Route::get('/pie_charts',[FuelDashboardController::class,'pieCharts']);

