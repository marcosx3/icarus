<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revenue>
 */
class RevenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'revenue_name' => $faker->company,
            'revenue_type' => $faker->randomElement(['Cartao Debito', 'Cartao Credito','Boleto']),
            'revenue_value' => $faker->randomFloat(),
            'revenue_month' => $faker->date,
            'revenue_client_id' => Client::factory(),
        ];
    }
}
