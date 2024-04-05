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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('bus_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('driver_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('times_per_day')->default(1);
            $table->string('first_going_time')->nullable();
            $table->string('first_return_time')->nullable();
            $table->string('second_going_time')->nullable();
            $table->string('second_return_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
