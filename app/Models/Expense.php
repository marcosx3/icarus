<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'expense_name',
        'expense_value',
        'expense_month',
        'expense_client_id',
        'tb_type_expense_id',
    ];
   

    public function client()
    {
        return $this->belongsTo(Client::class);
        
    }

    public function typeExpense()
    {
        return $this->belongsTo(TypeExpense::class,'tb_type_expense_id');
    }
}
