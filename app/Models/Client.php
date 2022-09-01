<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'phone_1',
        'phone_2',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class,'tb_client_id');
    }

    public function revenues()
    {
        return $this->hasMany(Revenue::class);
    }
    public function getClients(string $search = null)
    {
        $clients = $this->where( function ($query) use ($search){
            if($search)
            {
                $query->where('email',$search);
                $query->orWhere('name','LIKE',"%{$search}%");

            }
        });
        
        return $clients;
    }
}
