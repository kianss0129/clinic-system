<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
             $table->string('invoice_no')->unique();
            $table->foreignId('patient_id')->constrained('users');
            $table->foreignId('appointment_id')->constrained('appointments');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('Unpaid'); // Unpaid, Paid, Pending
            $table->date('billing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};
