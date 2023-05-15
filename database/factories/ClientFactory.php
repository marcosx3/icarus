<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'name' => $faker->name(),
            'email' => $faker->email(),
            'phone_1' => $faker->phoneNumber(),
            'phone_2' => $faker->phoneNumber(),
        ];
    }
}
