<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'guest_id',
        'room_id',
        'reservation_type',
        'reservation_start_date',
        'reservation_end_date',
        'number_of_guest',
        'special_requests',
        'added_by',
        'mode_of_reservation',
        'guest_name', // Add this line
        'guest_contact_or_email', // Add this line
        'status',

    ];

    protected $dates = [
        'reservation_start_date' => 'datetime',
        'reservation_end_date' => 'datetime',
    ];

    public function Rooms()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'room_id');
    }
    public function Guests()
    {
        return $this->belongsTo(User::class, 'guest_id', 'guest_id');
    }
    public function Carts()
    {
        return $this->hasMany(Cart::class, 'reservation_id', 'reservation_id');
    }
}