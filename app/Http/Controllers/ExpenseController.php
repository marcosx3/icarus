<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateExpenseRequest;
use App\Models\Client;
use App\Models\TypeExpense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function createExpenseView()
    {
        $clients = Client::all();
        $type_expense = TypeExpense::all();
        return view('expense.create', compact('clients', 'type_expense'));
    }
    public function createExpense(CreateUpdateExpenseRequest $request)
    {
        $data = $request->all();
        dd($data);
       
    }
}
