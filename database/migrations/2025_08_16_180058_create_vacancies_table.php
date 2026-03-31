<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();

            // Foreign key to clients (company)
            $table->foreignId('company_id')->nullable()->constrained('clients')->nullOnDelete();

            // Custom company details (if not using existing client)
            $table->string('custom_company_name')->nullable();
            $table->string('custom_company_country')->nullable();
            $table->string('vacancy_code')->unique()->nullable();

            // Vacancy details
            $table->string('title');
            $table->string('currency')->nullable();
            $table->date('interview_date')->nullable();
            $table->text('general_requirements')->nullable();
            $table->string('vacancy_image')->nullable();
            $table->longText('description')->nullable();

            // Status (e.g., active, closed)
            $table->string('status')->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
