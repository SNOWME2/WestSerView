<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FOBList extends Model
{
    use HasFactory;

    protected $table = 'food_and_beverages';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'status',
        'category',

    ];

    public function Carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'product_id');
    }
}