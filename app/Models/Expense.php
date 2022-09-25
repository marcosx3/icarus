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
        'expense_type',
        'expense_value',
        'expense_month',
        'expense_client_id',
    ];
   
    public function client()
    {
        return $this->belongsTo(Client::class);
        
    }

}
