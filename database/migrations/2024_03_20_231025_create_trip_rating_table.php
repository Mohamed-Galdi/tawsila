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
        Schema::create('trip_rating', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('student_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('bus_rate')->nullable();
            $table->string('bus_rate_description')->nullable();
            $table->integer('driver_rate')->nullable();
            $table->string('driver_rate_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('trip_rating');
    }
};
