<?php

use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\SurvivorController;
use Illuminate\Support\Facades\Route;


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


Route::controller(SurvivorController::class)->prefix('survivor')->name('survivor.')->group(function () {
    Route::post('add-survivor', 'addSurvivor')->name("add");
    Route::post('edit-survivor', 'editSurvivor')->name('edit');
    Route::post('update-survivor-location', 'updateLocation')->name('update.location');
    Route::post('update-survivor-infection', 'updateInfectionDetails')->name('update.infection');

});

Route::controller(ReportController::class)->prefix('report')->name('report.')->group(function () {
    Route::get('get-survivors', 'getSurvivorsList')->name("survivors");
    Route::get('get-infected-survivors', 'getSurvivorsList')->name("infected.survivors");
    Route::get('get-non-infected-survivors', 'getSurvivorsList')->name("non.infected.survivors");
    Route::get('get-robots', 'getSurvivorsList')->name("robots");
    Route::any('get-percentage', 'getPercentage')->name("survivor.details");
});




