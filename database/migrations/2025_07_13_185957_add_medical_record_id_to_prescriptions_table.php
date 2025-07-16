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
        $table->unsignedBigInteger('medical_record_id')->after('id');
        $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('prescriptions', function (Blueprint $table) {
        $table->dropForeign(['medical_record_id']);
        $table->dropColumn('medical_record_id');
    });
}
};