<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_Order extends Model
{
    use HasFactory;
    protected $table = 'work_order';
    protected $primaryKey = 'workOrder_id';

    protected $fillable = [
        'room_id',
        'hotel_id',
        'work_type',
        'work_name',
        'work_desc',
    ];
}