<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createanswerstable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) { // bikin tabel answers
            $table->id(); // generate id unik dari setiap answer yang dibikin
            $table->foreignId('question_id')->constrained()->onDelete('cascade'); // table answers itu punya fk question_id dr tabel question //ketika baris dr tabel answers atau quetion yg dihubungkan dengan fk tersebut di hapus maka tabel lain yg berhubungan akan ikut terhapus juga
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // table answers itu punya fk user_id dr tabel user
            $table->text('type_answers'); // menyimpan jawaban text yang lebih panjang dari tipe string
            $table->timestamps(); //digunakan untuk mncatat waktu kapan suatu answers dibuat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers'); // menghapus tabel answers
    }
};
