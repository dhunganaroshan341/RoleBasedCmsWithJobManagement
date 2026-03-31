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
        // database/migrations/2025_08_17_000003_create_jobs_table.php
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            // employer relation (optional)
            $table->foreignId('employer_id')
                ->nullable()
                ->constrained('employer_profiles')
                ->onDelete('set null');

            // ✅ REQUIRED relation (your fix)
            $table->foreignId('vacancy_id')
                ->constrained('vacancies')
                ->onDelete('cascade');

            $table->string('title');

            $table->text('description')->nullable();
            $table->text('requirements')->nullable();

            $table->string('location')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->nullable();
            $table->string('salary')->nullable();

            $table->enum('status', ['Active', 'Inactive'])->default('Active');

            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->string('link')->nullable();
            $table->string('icon_class')->nullable();

            $table->foreignId('our_country_id')
                ->nullable()
                ->constrained('our_countries')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
