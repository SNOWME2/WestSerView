<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $primaryKey = 'room_id'; // Primary key is 'room_id'

    protected $fillable = [
        'room_type',
        'room_number',
        'capacity',
        'price',
        'status',
        'added_by',
    ];



    public function Reservation()
    {
        return $this->hasOne(Reservations::class, 'room_id', 'room_id');
    }

    public function Guest()
    {
        return $this->hasOneThrough(User::class, Reservations::class, 'room_id', 'guest_id', 'room_id', 'guest_id');
    }

    public function workOrder(){
        return $this->hasOne(Work_Order::class, 'workOrder_id', 'workOrder_id');
    }
}