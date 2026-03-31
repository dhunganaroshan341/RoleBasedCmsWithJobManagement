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
        // database/migrations/2025_08_17_000001_create_job_seeker_profiles_table.php
        Schema::create('job_seeker_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // 👤 Basic Info
            $table->string('full_name');
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();

            // 👨‍👩‍👦 Next of Kin (JSON)
            $table->json('next_of_kin')->nullable();

            // 🛂 Passport Details (JSON)
            $table->json('passport_detail')->nullable();

            // 🧍 Physical
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('medical_status')->nullable();

            // 🎓 Education (JSON)
            $table->json('education')->nullable();

            // 💼 Experience
            $table->text('experience')->nullable();

            // 🌐 Languages (JSON)
            $table->json('languages')->nullable();

            // 🧪 Interview
            $table->string('interview_status')->nullable();
            $table->string('grade')->nullable();

            // 📎 Documents
            $table->string('resume_file')->nullable();
            $table->string('other_documents')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_profiles');
    }
};
