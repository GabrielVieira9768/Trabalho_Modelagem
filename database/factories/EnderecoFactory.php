<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cep' => $this->faker->postcode(),
            'estado' => $this->faker->state(),
            'cidade' => $this->faker->city(),
            'logradouro' => $this->faker->streetAddress(),
            'bairro' => $this->faker->word(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->optional()->word(),
        ];
    }
}