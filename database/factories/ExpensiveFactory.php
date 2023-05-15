<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExpensiveFactory extends Factory
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
            'expense_name' => $faker->company,
            'expense_type' => $faker->randomElement(['Cartao Debito', 'Cartao Credito','Boleto']),
            'expense_value' => $faker->randomFloat(),
            'expense_month' => $faker->date,
            'expense_client_id' => Client::factory(),
        ];
    }
}
