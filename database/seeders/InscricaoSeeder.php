<?php

namespace Database\Seeders;

use App\Models\Inscricao;
use Illuminate\Database\Seeder;

class InscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Inscricao::factory(10)->create();
    }
}