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
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('email')->max(30)->default('contact@tawsila.com');
            $table->string('phone')->max(30)->default('00966 2 5466140');
            $table->string('emergency')->max(30)->default('00966 3 6254169');
            $table->string('address')->max(30)->default('الرياض -حي الملقا - انس مالك');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_pages');
    }
};
