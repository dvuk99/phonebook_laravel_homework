<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\CityController;
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

// testne rute
Route::get('/pocetna',[HomeController::class, 'getHomePage']);
Route::get('/kontakt/{id}',[HomeController::class,'getContactDetails']);
Route::get('/contact/save',[HomeController::class,'saveContact']);
Route::get('/kountry',[HomeController::class,'saveCountry']);

// Contact routes

Route::get('/contacts',[ContactController::class,'index'])->name('contact.index');
Route::get('/contacts/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/contacts',[ContactController::class,'save'])->name('contact.save');
Route::get('/contacts/{id}/edit',[ContactController::class,'edit'])->name('contact.edit');
Route::put('/contacts/{id}',[ContactController::class,'update'])->name('contact.update');
Route::delete('/contacts/{id}',[ContactController::class,'delete'])->name('contact.delete');


// Country routes

Route::get('/countries',[CountryController::class,'index'])->name('country.index');
Route::get('/countries/create',[CountryController::class,'create'])->name('country.create');
Route::post('/countries',[CountryController::class,'save'])->name('country.save');
Route::get('/countries/{id}/edit',[CountryController::class,'edit'])->name('country.edit');
Route::put('/countries/{id}',[CountryController::class,'update'])->name('country.update');
Route::delete('/countries/{id}',[CountryController::class,'delete'])->name('country.delete');


// Hobby routes

Route::get('/hobbies',[HobbyController::class,'index'])->name('hobby.index');
Route::get('/hobbies/create',[HobbyController::class,'create'])->name('hobby.create');
Route::post('/hobbies',[HobbyController::class,'save'])->name('hobby.save');
Route::get('/hobbies/{id}/edit',[HobbyController::class,'edit'])->name('hobby.edit');
Route::put('/hobbies/{id}',[HobbyController::class,'update'])->name('hobby.update');
Route::delete('/hobbies/{id}',[HobbyController::class,'delete'])->name('hobby.delete');

// City routes

Route::get('/cities',[CityController::class,'index'])->name('city.index');
Route::get('/cities/create',[CityController::class,'create'])->name('city.create');
Route::post('/cities',[CityController::class,'save'])->name('city.save');
Route::get('/cities/{id}/edit',[CityController::class,'edit'])->name('city.edit');
Route::get('/cities/{name}',[CityController::class,'findCountryByName']);
Route::put('/cities/{id}',[CityController::class,'update'])->name('city.update');
Route::delete('/cities/{id}',[CityController::class,'delete'])->name('city.delete');


