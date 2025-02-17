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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Chave Primária
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->String('cpf')->unique();
            $table->date('data_nascimento');
            $table->String('telefone');
            $table->boolean('cargo')->default(false);
            $table->String('curriculo')->nullable();
            $table->unsignedBigInteger('endereco_id'); // Chave Estrangeira
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('inscricoes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};