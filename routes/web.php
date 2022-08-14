<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeExpenseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // CLIENT ROUTES
    Route::get('/clientes/cadastro', [ClientController::class, 'createClientView']);
    Route::get('/clientes/lista', [ClientController::class, 'listClientView'])->name('client.list');
    Route::get('/clientes/editar/{id}', [ClientController::class, 'editClientView'])->name('client.edit');
    Route::get('/clientes/excluir/{id}', [ClientController::class, 'destroyClient'])->name('client.delete');
    Route::post('/clientes/atualizar/{id}', [ClientController::class, 'editClient'])->name('client.update');
    Route::post('/clientes/cadastro', [ClientController::class, 'createClient'])->name('client.create');
    //TYPE EXPENSE
    Route::get('/despesa/tipo/cadastro',[TypeExpenseController::class,'createTypeExpenseView']);
    Route::get('/despesa/tipo/lista',[TypeExpenseController::class,'listTypeExpense'])->name('expense.type.list');
    Route::get('/despesa/tipo/editar/{id}',[TypeExpenseController::class, 'editTypeExpenseView'])->name('expense.type.edit');
    Route::get('/despesa/tipo/excluir/{id}',[TypeExpenseController::class,'deleteTypeExpense'])->name('expense.type.delete');
    Route::post('despesa/tipo/cadastro',[TypeExpenseController::class,'createTypeExpense'])->name('expense.type.create');
    Route::post('/despesa/tipo/atualizar/{id}',[TypeExpenseController::class, 'updateTypeExpense'])->name('expense.type.update');
    // EXPENSE ROUTES
    Route::get('/despesa/cadastro',[ExpenseController::class,'createExpenseView'])->name('expense.create.view');
    Route::post('/despesa/cadastro',[ExpenseController::class,'createExpense'])->name('expense.create');

});
