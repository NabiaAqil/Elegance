<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',          
        'specialization',
        'bio',
        'experience_years',
        'profile_image',
        'rating',
        'commission_rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}