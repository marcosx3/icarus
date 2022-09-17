<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeExpense extends Model
{
    use HasFactory;
    protected $table = 'type_expenses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type_expense',
    ];

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
}
