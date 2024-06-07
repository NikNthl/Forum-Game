<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // primary key yg otomatis bertambah dan unik untuk setiap user
            $table->string('name'); //untuk menyimpan username
            $table->string('email')->unique(); //untuk menyimpan alamat email pengguna, harus unik
            $table->string('password'); //untuk menyimpan password yang telah di hash
            $table->rememberToken(); //untuk menyimpan token yang digunakan untuk autentikasi
            $table->timestamps();//untuk mengatur waktu secara otomatis ketika create dan update setiap kali membuat akun ataupun mengupdate akun
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); //untuk memastikan email tidak ada duplikasi
            $table->string('token'); //untuk menyimpan token reset password
            $table->timestamp('created_at')->nullable();//untuk menandai wkatu kapan token reset password dibuat, nullable berarti menunjukan bahwa kolom dapat memiliki nilai null jika waktu pembuatan token tidak diketahui atau tidak relevan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
