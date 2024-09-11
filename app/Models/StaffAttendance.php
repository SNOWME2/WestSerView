<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model
{
    use HasFactory;
    protected $table = 'staff_attendance';


    protected $fillable = ['staff_id', 'login_at', 'logout_at'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
