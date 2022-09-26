<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone_1',
        'phone_2',
    ];
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'expense_client_id');
    }
    public function revenues()
    {
        return $this->hasMany(Revenue::class, 'revenue_client_id');
    }
}
