<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateExpenseRequest;
use App\Jobs\ExpenseForMonths;
use App\Models\Client;
use App\Models\TypeExpense;
use App\Repositories\ExpenseRepository;
use DateTime;

class ExpenseController extends Controller
{
    protected ExpenseRepository $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }
    public function createExpenseView()
    {
        $clients = Client::all();
        $type_expense = TypeExpense::all();
        return view('expense.create', compact('clients', 'type_expense'));
    }
    public function createExpense(CreateUpdateExpenseRequest $request)
    {
        $data = $request->all();
        if($data['repeat'] == true)
        {
            $mes = intval($data['expense_month']->format('m'));
            while($mes <= 12)
            {   
                $aux = new DateTime($data['expense_month']);
                $data['expense_month'] = $aux->modify('+1month');
                ExpenseForMonths::dispatch($data);
                $mes++;
            }
        } 
        else 
        {
            $this->expenseRepository->create($data);
        }
       
        dd($data);
    }
}
