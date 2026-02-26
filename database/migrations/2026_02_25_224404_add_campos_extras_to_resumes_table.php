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
        Schema::table('resumes', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('desired_job_type')->nullable();
            $table->string('availability')->nullable();
            $table->decimal('salary_expectation', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn([
                'birth_date',
                'desired_job_type',
                'availability',
                'salary_expectation'
            ]);
        });
    }
};