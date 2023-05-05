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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('name');
            $table->string('blood_pressure');
            $table->string('bpm');
            $table->string('temperature');
            $table->string('nurse_note')->nullable();
            $table->string('doctor_comment')->nullable();
            $table->string('prescription')->nullable();
            $table->string('designate')->nullable();
            $table->string('status')->default('open');
            $table->string('flag')->nullable();
            $table->string('outsourced_location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
