<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hire_workers', function (Blueprint $table) {
            $table->id();

            // Contact Person
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');

            // Company Details
            $table->string('company_name');
            $table->string('web_url')->nullable();
            $table->string('industry');
            $table->string('location');

            // Job Request
            $table->string('position');
            $table->string('openings'); // keep string since it's mixed text (e.g. 10 male, 20 female)
            $table->string('salary_range');
            $table->string('salary_range_to');
            $table->longText('job_description');

            // Optional (VERY useful)
            $table->enum('status', ['Pending', 'Reviewed', 'Contacted'])
                ->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hire_workers');
    }
};
