<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\TypeExpenseController;
use App\Http\Controllers\TypeRevenueController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.clients');
    // CLIENT ROUTES
    Route::get('/clientes/cadastro', [ClientController::class, 'createClientView']);
    Route::get('/clientes/lista', [ClientController::class, 'listClientView'])->name('client.list');
    Route::get('/clientes/editar/{id}', [ClientController::class, 'editClientView'])->name('client.edit');
    Route::get('/clientes/excluir/{id}', [ClientController::class, 'destroyClient'])->name('client.delete');
    Route::post('/clientes/atualizar/{id}', [ClientController::class, 'editClient'])->name('client.update');
    Route::post('/clientes/cadastro', [ClientController::class, 'createClient'])->name('client.create');
    //TYPE EXPENSE
    Route::get('/despesa/tipo/cadastro', [TypeExpenseController::class, 'createTypeExpenseView']);
    Route::get('/despesa/tipo/lista', [TypeExpenseController::class, 'listTypeExpense'])->name('expense.type.list');
    Route::get('/despesa/tipo/editar/{id}', [TypeExpenseController::class, 'editTypeExpenseView'])->name('expense.type.edit');
    Route::get('/despesa/tipo/excluir/{id}', [TypeExpenseController::class, 'deleteTypeExpense'])->name('expense.type.delete');
    Route::post('/despesa/tipo/cadastro', [TypeExpenseController::class, 'createTypeExpense'])->name('expense.type.create');
    Route::post('/despesa/tipo/atualizar/{id}', [TypeExpenseController::class, 'updateTypeExpense'])->name('expense.type.update');
    //TYPE REVENUE
    Route::get('/receita/tipo/cadastro', [TypeRevenueController::class, 'createTypeRevenueView']);
    Route::get('/receita/tipo/lista', [TypeRevenueController::class, 'listTypeRevenue'])->name('revenue.type.list');
    Route::get('/receita/tipo/editar/{id}', [TypeRevenueController::class, 'editTypeRevenueView'])->name('revenue.type.edit');
    Route::get('/receita/tipo/excluir/{id}', [TypeRevenueController::class, 'deleteTypeRevenue'])->name('revenue.type.delete');
    Route::post('/receita/tipo/atualizar/{id}', [TypeRevenueController::class, 'updateTypeRevenue'])->name('revenue.type.update');
    Route::post('/receita/tipo/cadastro', [TypeRevenueController::class, 'createRevenueType'])->name('revenue.type.create');
    // EXPENSE ROUTES
    Route::get('/despesa/cadastro', [ExpenseController::class, 'createExpenseView'])->name('expense.create.view');
    Route::get('/despesa/lista', [ExpenseController::class, 'listExpenseView'])->name('expense.list');
    Route::get('/despesa/edit/{id}', [ExpenseController::class, 'editExpenseView'])->name('expense.edit');
    Route::get('/despesa/delete/{id}', [ExpenseController::class, 'deleteExpense'])->name('expense.delete');
    Route::post('/despesa/update/{id}', [ExpenseController::class, 'updateExpenseView'])->name('expense.update');
    Route::post('/despesa/cadastro', [ExpenseController::class, 'createExpense'])->name('expense.create');
    // REVENUE ROUTES
    Route::get('/receita/cadastro', [RevenueController::class, 'createRevenueView'])->name('revenue.create.view');
    Route::get('/receita/lista', [RevenueController::class, 'listRevenueView'])->name('revenue.list');
    Route::get('/receita/edit/{id}', [RevenueController::class, 'editRevenueView'])->name('revenue.edit');
    Route::get('/receita/delete/{id}', [RevenueController::class, 'deleteRevenue'])->name('revenue.delete');
    Route::post('/receita/update/{id}', [RevenueController::class, 'updateRevenueView'])->name('revenue.update');
    Route::post('/receita/cadastro', [RevenueController::class, 'createRevenue'])->name('revenue.create');

    //FINANCE
   Route::get('/cliente/financas/{id}',[FinanceController::class,'viewFinance'])->name('client.finance');
   
});
