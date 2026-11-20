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
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // Kis user ne book kiya
        $table->foreignId('staff_id')->constrained('users')->onDelete('cascade'); // Kis staff ke sath
        $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Konsi service
        $table->date('appointment_date');
        $table->time('appointment_time')->nullable();
        $table->string('status')->default('pending'); // pending, confirmed, cancelled
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_services');
    }
};
