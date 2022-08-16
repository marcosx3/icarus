<?php

namespace App\Repositories;

use App\Interfaces\ExpenseInterface;
use App\Models\Expense;

class ExpenseRepository implements ExpenseInterface
{

    public function all()
    {
        return Expense::all();
    }
    public function create(array $data)
    {
        return Expense::create($data);
    }
    public function edit($id)
    {
        return Expense::find($id);
    }
    public function update(array $data, $id)
    {
        return Expense::where('id', $id)->update($data);
    }
    public function delete($id)
    {
        Expense::destroy($id);
    }
}
