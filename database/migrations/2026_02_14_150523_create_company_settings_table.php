<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('logo_path')->nullable();
            $table->text('address_head_office');
            $table->string('operational_hours');
            $table->string('wa_number_indo');
            $table->string('wa_number_saudi')->nullable();
            $table->string('email_primary');
            $table->string('email_secondary')->nullable();
            $table->json('social_media')->nullable();
            $table->json('branches')->nullable();
            $table->json('stats')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
