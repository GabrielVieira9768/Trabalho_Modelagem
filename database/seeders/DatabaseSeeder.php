<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Endereco;
use App\Models\Inscricao;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EnderecoSeeder::class,
            UserSeeder::class,
            OngSeeder::class,
            ProjetoSeeder::class,
            InscricaoSeeder::class,
        ]);
    }
}
