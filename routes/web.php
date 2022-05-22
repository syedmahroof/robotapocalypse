<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\EmployeeController::class)->prefix('employee')->name('employee.')->group(function () {
    Route::get('list', 'list')->name("list");
    Route::get('add-employee', 'addEmployee')->name("add.employee");
    Route::post('create-employee-post', 'postEmployee')->name("add.post");
    Route::any('get-all-employee', 'getEmployeee')->name("get-all-employee");


    Route::get('edit-employee/{id}', 'editEmployee')->name('edit');
    Route::post('update-employee', 'postUpdateEmployee')->name('edit.post');
    Route::get('delete-employee/{id}', 'deleteEmployee')->name('delete');

    Route::get('view-employee/{id}', 'viewEmployee')->name('view');


});

Route::controller(App\Http\Controllers\DesignationController::class)->prefix('designation')->name('designation.')->group(function () {
    Route::get('list', 'list')->name("list");
    Route::get('add-designation', 'addDesignation')->name("add-designation");
    Route::post('add-designation-post', 'postDesignation')->name("add.post");
    Route::any('get-all-desitinations', 'getDestination')->name("get-all-desitinations");
    Route::get('edit-designation/{id}', 'editDesignation')->name('edit');
    Route::post('update-designation', 'postUpdateDesignation')->name('edit.post');
    Route::get('delete-designation/{id}', 'deleteDesignation')->name('delete');

});



