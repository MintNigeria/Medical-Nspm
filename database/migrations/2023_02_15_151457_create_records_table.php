<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('patient_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->integer('blood_pressure_systolic');
            $table->integer('blood_pressure_diastolic');
            $table->integer('pulse_rate');
            $table->longText('assessment')->nullable();
            $table->longText('prescription')->nullable();
            $table->string('weight')->nullable();
            $table->string('temp');
            $table->string('bmi')->nullable();
            $table->longText('nurse_note');
            $table->string('service_type')->default('prescription');
            $table->string('management')->nullable();
            $table->string('status')->default('open');
            $table->string('processing')->default(false);
            $table->string('processing_by')->nullable();
            $table->string('flag')->nullable();
            $table->string('designate')->nullable();
            $table->string('clinic_location')->nullable();
            $table->string('locality')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
