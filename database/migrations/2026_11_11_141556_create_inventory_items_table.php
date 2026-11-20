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
    Schema::create('inventory_items', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // e.g., Facial Kit, Shampoo
        $table->string('brand')->nullable(); // e.g., O3+, L'Oreal
        $table->integer('quantity')->default(0);
        $table->integer('low_stock_alert')->default(5); // Kitna bache toh alert
        $table->decimal('price', 8, 2)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_items');
    }
};
