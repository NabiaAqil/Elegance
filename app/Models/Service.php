<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Kaunse columns ko database mein save karne ki ijazat hai
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'short_description',
        'brands_used',
        'price',
        'duration',
    ];

    // Yeh service kis category ki hai (Facial, Makeup, etc.)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
public function reviews(): HasMany
{
    return $this->hasMany(Review::class);
}



}