<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\TypeExpense;

class TypeExpenseRepository implements BaseInterface
{
    public function all()
    {
        return TypeExpense::all();
    }

    public function create(array $data)
    {
        return TypeExpense::create($data);
    }

    public function edit($id)
    {
        return TypeExpense::find($id);
    }

    public function update(array $data, $id)
    {
        return TypeExpense::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        TypeExpense::destroy($id);
    }
}
