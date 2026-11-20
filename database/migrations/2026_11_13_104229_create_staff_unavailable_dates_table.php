<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('staff_unavailable_dates', function (Blueprint $table) {
        $table->id();
        $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
        $table->date('unavailable_date');
        $table->string('reason')->nullable(); // Optional (jaise "Leave" ya "Sick")
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_unavailable_dates');
    }
};
