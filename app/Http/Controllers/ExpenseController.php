<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateExpenseRequest;
use App\Models\Client;
use App\Repositories\ExpenseRepository;


class ExpenseController extends Controller
{
    protected ExpenseRepository $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    private function showAllExpense()
    {
        $this->expenseRepository->all();
        return redirect()->route('expense.list');
    }

    public function createExpenseView()
    {
        $clients = Client::all();
        return view('expense.create', compact('clients'));
    }
    public function createExpense(CreateUpdateExpenseRequest $request)
    {
        $data = $request->all();
        if ($data['repeat'] != 0) {
            $month = $data['repeat'];
            while ($month >= 0) {
                $this->expenseRepository->create($data);
                $data['expense_month'] = date('Y-m-d', strtotime('+1 month', strtotime($data['expense_month'])));
                $month--;
            }
        } else {
            $this->expenseRepository->create($data);
        }
        return $this->showAllExpense();
    }

    public function listExpenseView()
    {
        $expenses = $this->expenseRepository->all();
        return view('expense.list', compact('expenses'));
    }

    public function editExpenseView($id)
    {
        $expense = $this->expenseRepository->edit($id);
        $clients = Client::all();
        return view('expense.update', compact('expense', 'clients'));
    }
    public function updateExpenseView(CreateUpdateExpenseRequest $request, $id)
    {
        $data = $request->all();
        $this->expenseRepository->update($data, $id);
        return $this->showAllExpense();
    }
    public function deleteExpense($id)
    {
        $this->expenseRepository->delete($id);
        return $this->showAllExpense();
    }
}
