<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;


    public function client()
    {
        return $this->belongsTo(Client::class,'tb_client_id');
    }

       public function typeRevenue()
    {
        return $this->belongsTo(TypeExpense::class,'tb_type_revenue_id');
    }
}
