<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosIncome extends Model
{
    use HasFactory;

    protected $primaryKey = 'income_id';
    protected $fillable = [
        'total_amount',
        'income_date',
        'period',
    ];

    protected $casts = [
        'income_date' => 'date',
    ];
}
