<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateUpdateExpenseRequest;
use App\Models\Client;
use App\Repositories\ExpenseRepository;


class ExpenseController extends Controller
{
    protected ExpenseRepository $model;

    public function __construct(ExpenseRepository $model)
    {
        $this->model = $model;
    }

    public function createExpenseView()
    {
        $clients = Client::all();
        return view('expense.create', compact('clients'));
    }

    private function createMoreExpense(array $data)
    {
       
       if ($data['repeat'] != 0) {
            $month = $data['repeat'];
            while ($month >= 0) {
                $this->model->create($data);
                $data['expense_month'] = date('Y-m-d', strtotime('+1 month', strtotime($data['expense_month'])));
                $month--;
            }
        } else {
            $this->model->create($data);
        }
        return true;
    }
    public function createExpense(CreateUpdateExpenseRequest $request)
    {
        $data = $request->all();
        if($this->createMoreExpense($data))
        {
            return redirect()->route('expense.list')->with("success","Despesa cadastrada com sucesso!");
        }
        else 
        {
            return redirect()->route('expense.list')->with("error","Não foi possível cadastrar uma nova despesa.");
        }
    }

    public function listExpenseView()
    {
        $expenses = $this->model->all();
        return view('expense.list', compact('expenses'));
    }

    public function editExpenseView($id)
    {
        $expense = $this->model->edit($id);
        $clients = Client::all();
        return view('expense.update', compact('expense', 'clients'));
    }
    public function updateExpenseView(CreateUpdateExpenseRequest $request, $id)
    {
        $data = $request->all();
        if ($this->model->update($data, $id)) {
            return redirect()->route('expense.list')->with('success', "Despesa atualizada com sucesso!");
        } else {
            return redirect()->route('expense.list')->with('error', "Não foi possível atualizar despesa.");
        }
    }
    public function deleteExpense($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->route('expense.list')->with('info', "Despesa excluída.");
        } else {
            return redirect()->route('expense.list')->with('error', "Despesa não excluída.");
        }
    }
}
