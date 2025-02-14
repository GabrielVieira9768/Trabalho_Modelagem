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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id(); // Chave Primária
            $table->string('nome');
            $table->date('data');
            $table->string('imagem');
            $table->string('local');
            $table->string('descricao');
            $table->integer('vagas');
            $table->unsignedBigInteger('ong_id'); // Chave Estrangeira
            $table->timestamps();
        });

        Schema::table('inscricoes', function (Blueprint $table) {
            $table->foreign('projeto_id')->references('id')->on('projetos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};