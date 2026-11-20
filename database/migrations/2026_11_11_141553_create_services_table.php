<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Yeh column missing tha
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable(); // Image path save karne ke liye
            $table->text('short_description')->nullable();
            $table->text('brands_used')->nullable();
            $table->integer('price')->nullable();
            $table->integer('duration')->nullable(); // Minutes mein
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};