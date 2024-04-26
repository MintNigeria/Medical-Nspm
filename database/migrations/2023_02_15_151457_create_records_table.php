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
            //
            $table->integer('blood_pressure_systolic');
            $table->integer('blood_pressure_diastolic');
            $table->integer('pulse_rate');
            $table->json('doctor_act')->nullable();
            $table->json('tests')->nullable();
            $table->longText('complaint')->nullable();
            $table->longText('history_complaint')->nullable();
            $table->longText('physicalexam')->nullable();
            $table->longText('systemic_exam')->nullable();
            $table->longText('assessment')->nullable();
            $table->string('weight')->nullable();
            $table->string('temp');
            $table->string('bmi')->nullable();
            $table->longText('nurse_note');
            $table->string('status')->default('open');
            $table->string('processing')->default(false);
            $table->string('processing_by')->nullable();
            $table->string("processed_defacto")->nullable();
            $table->string('flag')->nullable();
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
