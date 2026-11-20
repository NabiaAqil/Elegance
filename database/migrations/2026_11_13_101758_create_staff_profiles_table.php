<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff_profiles', function (Blueprint $table) {
            $table->id();
            
            // Staff user se link
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Kis category ka expert hai (Facial, Makeup, Hair, etc.)
            $table->string('specialization'); 
            
            // Profile ki picture
            $table->string('profile_image')->nullable(); 
            
            // Intro/Bio
            $table->text('bio')->nullable(); 
            
            // Experience
            $table->integer('experience_years')->nullable();
            
            // Average Rating (default 0)
            $table->decimal('rating', 3, 1)->default(0); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_profiles');
    }
};