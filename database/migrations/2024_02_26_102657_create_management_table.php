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
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table
            ->foreignId('record_id')
            ->constrained()
            ->onDelete('cascade');
            $table->json('doctor_act')->nullable();
            $table->json('tests')->nullable();
            $table->string('flag_nurse')->nullable();
            $table->longText('prescription')->nullable();
            $table->longText('nurse_mgmt')->nullable();
            $table->string('flag_prescription')->nullable();
            $table->string('pharmacy_notes')->nullable();
            $table->string('nurse_notes')->nullable();
            $table->string('labtest')->nullable();
            $table->string('clinic')->nullable();
            $table->string('processing_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management');
    }
};
