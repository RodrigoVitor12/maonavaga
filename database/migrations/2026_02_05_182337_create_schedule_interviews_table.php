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
        Schema::create('schedule_interviews', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("time");
            $table->string("location");
            $table->text("notes")->nullable();
            $table->enum('type', ['local', 'online']);
            
            $table->foreignId('candidate_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('vacancy_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_interviews');
    }
};