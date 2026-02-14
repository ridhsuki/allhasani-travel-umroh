<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('badge', ['populer', 'rekomendasi', 'eksklusif', 'hemat'])->nullable();
            $table->decimal('price', 15, 2);
            $table->integer('duration_days');
            $table->integer('max_pax');
            $table->json('features');
            $table->string('bonus')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
