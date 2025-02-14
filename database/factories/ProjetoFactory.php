<?php

namespace Database\Factories;

use App\Models\Ong;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projeto>
 */
class ProjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'data' => $this->faker->date(),
            'imagem' => $this->faker->imageUrl(),
            'local' => $this->faker->city(),
            'descricao' => $this->faker->text(),
            'vagas' => $this->faker->numberBetween(1, 100),
            'ong_id' => Ong::factory(), // Relaciona o projeto a uma ONG
        ];
    }
}