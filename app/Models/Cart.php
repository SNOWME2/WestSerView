<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'reservation_id',
        'product_id',
        'quantity',
        'price',
        'catering_type',
        'total',
        'status'

    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class, 'reservation_id', 'reservation_id');
    }

    public function fob()
    {
        return $this->belongsTo(FOBList::class, 'product_id', 'product_id');
    }
}