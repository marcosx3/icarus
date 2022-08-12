<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/Clientes/Cadastro',[ClientController::class,'createClientView']);
    Route::get('/Clientes/Lista',[ClientController::class,'listClientView']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/Clientes/Editar/{id}',[ClientController::class,'editClientView'])->name('client.edit');

    Route::post('/Clientes/Atualizar/{id}',[ClientController::class,'editClient'])->name('client.update');
    Route::post('/Clientes/Cadastro',[ClientController::class,'createClient'])->name('client.create');
});


