<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ong>
 */
class OngFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
            'telefone' => $this->faker->phoneNumber(),
            'categoria' => $this->faker->randomElement(['opcao1', 'opcao2', 'opcao3']),
            'descricao' => $this->faker->text(),
            'logo' => $this->faker->imageUrl(),
            'documento' => $this->faker->word(),
            'status' => $this->faker->boolean(),
            'endereco_id' => Endereco::factory(), // Relaciona a ONG a um endereço
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}