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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table
            ->foreignId('record_id')
            ->constrained()
            ->onDelete('cascade');
            $table->string('feedback_type');
            $table->string("clinic_doctor")->nullable();
            $table->string("clinic_location")->nullable();
            $table->string("observation")->nullable();
            $table->string("detected_illness")->nullable();
            $table->string("consultation")->nullable();
            $table->string("next_action")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
