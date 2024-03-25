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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('staff_id');
            $table->longText('address');
            $table->longText('email');
            $table->longText('department');
            $table->string('prefix');
            $table->string('contact');
            $table->string('height');
            $table->string('allergy')->nullable();
            $table->string('dependencies')->nullable();
            $table->string('birth_date');
            $table->string('location');
            $table->boolean('activate')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
