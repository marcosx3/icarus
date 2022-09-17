<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRevenue extends Model
{
    use HasFactory;
    protected $table = 'type_revenues';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type_revenue',
    ];
    public function revenue()
    {
        return $this->hasMany(Revenue::class);
    }
}
