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
    Schema::table('prescriptions', function (Blueprint $table) {
        $table->string('medicine_name')->after('medical_record_id');
        $table->string('dosage');
        $table->text('instructions')->nullable();
    });
}

public function down(): void
{
    Schema::table('prescriptions', function (Blueprint $table) {
        $table->dropColumn(['medicine_name', 'dosage', 'instructions']);
    });
}
};
