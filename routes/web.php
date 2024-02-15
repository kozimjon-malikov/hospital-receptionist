<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('add_doctor_view',[AdminController::class,'view_doctor']);
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::post('upload_doctor',[AdminController::class,'upload']);
Route::post('appointment',[HomeController::class,'appointment']);
Route::get('myappointment',[HomeController::class,'myappointment']);
Route::get('delete_appoint/{id}',[HomeController::class,'delete_appoint']);
Route::get('showappointment',[AdminController::class,'showappointment']);
Route::get('approved/{id}',[AdminController::class,'approved']);
Route::get('cancel_appointment/{id}',[AdminController::class,'cancel_appointment']);
Route::get('show_doctor',[AdminController::class,'show_doctor']);
Route::get('delete_doctor/{id}',[AdminController::class,'delete_doctor']);
Route::get('update_doctor/{id}',[AdminController::class,'update_doctor']);
Route::post('edit_doctor/{id}',[AdminController::class,'edit_doctor']);
Route::get('viewemail/{id}',[AdminController::class,'viewemail']);
Route::post('sendemail/{id}',[AdminController::class,'sendemail']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
