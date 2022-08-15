<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRevenue extends Model
{
    use HasFactory;
    public function revenue()
    {
        return $this->hasMany(Revenue::class);
    }
}
