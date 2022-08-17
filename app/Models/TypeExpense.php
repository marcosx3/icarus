<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_expense',
    ];

    public function expense()
    {
        return $this->hasMany(Expense::class,'tb_type_expense_id');
    }
}
