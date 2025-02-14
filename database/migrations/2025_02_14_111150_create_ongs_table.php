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
        Schema::create('ongs', function (Blueprint $table) {
            $table->id(); // Chave Primária
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->String('cnpj')->unique();
            $table->String('telefone');
            $table->enum('categoria', ['opcao1', 'opcao2', 'opcao3']);
            $table->String('descricao');
            $table->String('logo');
            $table->String('documento');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('endereco_id'); // Chave Estrangeira
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('projetos', function (Blueprint $table) {
            $table->foreign('ong_id')->references('id')->on('ongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongs');
    }
};