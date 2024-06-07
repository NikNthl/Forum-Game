<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createquestionstable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); # ini id question 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); #ini yang menghububngkan antara users dan question
            $table->text('questions'); #ini untuk menyumpan pertanyaan nya 
            $table->timestamps();#ini waktu pada saat pertanyaannya di buat
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
