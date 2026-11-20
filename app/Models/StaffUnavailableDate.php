<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffUnavailableDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'unavailable_date',
        'reason',
    ];

    // Staff relationship
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}