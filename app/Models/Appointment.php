<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Database mein in columns ko save karne ki ijazat
    protected $fillable = [
        'customer_id',
        'staff_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes',
    ];

    // Appointment jis customer ki hai
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Appointment jis staff ke sath hai
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    // Appointment konsi service ki hai
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
public function review(): HasOne
{
    return $this->hasOne(Review::class);
}


}