<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_name',
        'expense_value',
        'expense_month',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class,'tb_client_id');
    }

    public function typeExpense()
    {
        return $this->belongsTo(TypeExpense::class,'tb_type_expense_id');
    }
}
