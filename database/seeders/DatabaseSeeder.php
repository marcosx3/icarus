<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Expense;
use App\Models\Revenue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Client::factory(10)->create()->each(function($client){
            $faker = \Faker\Factory::create('pt_BR');
            Expense::create([  
            'expense_name' => $faker->company,
            'expense_type' => $faker->randomElement(['Cartao Debito', 'Cartao Credito','Boleto']),
            'expense_value' => $faker->randomFloat(2,2,5000.00),
            'expense_month' => $faker->date,
            'expense_client_id' => $client->id,
        ]);
            Revenue::create([ 
                'revenue_name' => $faker->company,
            'revenue_type' => $faker->randomElement(['Cartao Debito', 'Cartao Credito','Boleto']),
            'revenue_value' => $faker->randomFloat(2,2,5000.00),
            'revenue_month' => $faker->date,
            'revenue_client_id' => $client->id,
        ]);
        });
    }
}
