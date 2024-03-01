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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('patient_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('comment');
            $table->string('start_day');
            $table->string('end_day');
            $table->string("approved")->default(false);
            $table->string("processed_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
