<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseRepository implements BaseInterface
{

    public function all()
    {
        return Expense::all();
    }
    public function create(array $data)
    {
       return  DB::table('expenses')
        ->insert([
         "expense_name" => $data['expense_name'],
         'expense_value' => $data['expense_value'],
         'expense_month' => $data['expense_month'],
         'created_at' => \Carbon\Carbon::now(),
         'updated_at' => \Carbon\Carbon::now(),
         'expense_client_id' => $data['clients'],
         'tb_type_expense_id' => $data['type_expense'],
       
        ]);
    }
    public function edit($id)
    {
        return Expense::find($id);
    }
    public function update(array $data, $id)
    {
        return DB::table('expenses')
        ->where('id',$id)
        ->update([
            "expense_name" => $data['expense_name'],
            'expense_value' => $data['expense_value'],
            'expense_month' => $data['expense_month'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'expense_client_id' => $data['clients'],
            'tb_type_expense_id' => $data['type_expense'],
          
           ]);
       
    }
    public function delete($id)
    {
        Expense::destroy($id);
    }
}
