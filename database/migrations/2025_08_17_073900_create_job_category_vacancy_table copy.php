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
        Schema::create('job_category_vacancy', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vacancy_id')
                ->constrained('vacancies')
                ->onDelete('cascade');

            $table->foreignId('job_category_id')
                ->constrained('job_categories')
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['vacancy_id', 'job_category_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_category_vacancy');
    }
};
