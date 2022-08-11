<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function (){
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


