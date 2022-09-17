<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'revenues';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'revenue_name',
        'revenue_value',
        'revenue_month',
        'revenue_client_id',
        'tb_type_revenue_id',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

       public function typeRevenue()
    {
        return $this->belongsTo(TypeRevenue::class,'tb_type_revenue_id');
    }
}
