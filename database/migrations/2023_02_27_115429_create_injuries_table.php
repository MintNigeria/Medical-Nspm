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
        Schema::create('injuries', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('patient_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('date_accident_death');
            $table->string('time_accident_death');
            $table->longText('location_accident');
            $table->longText('description_accident');
            $table->string('severity');
            $table->string('treatment');
            $table->string('death_cause')->nullable();
            $table->longText('health_status')->nullable();
            $table->string('disability')->nullable();
            $table->string('attending_doctor')->nullable();
            $table->string('insurance_doctor')->nullable();
            $table->string('insurance_date')->nullable();
            $table->integer('days_absent')->nullable();
            $table->string('cost_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('injuries');
    }
};
