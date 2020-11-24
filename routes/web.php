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
Route::get('/faq', function (){
    return view('faq.index');
})->name('index');

//    Route::get('/faq', \App\Http\Livewire\Faq\FaqComponent::class);
//    Route::get('/faq/{id}', \App\Http\Livewire\Faq\FaqComponent::class);
