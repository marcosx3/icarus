<?php

namespace App\Providers;

use App\Interfaces\ClientInterface;
use App\Interfaces\ExpenseInterface;
use App\Repositories\ClientRepository;
use App\Repositories\TypeExpenseRepository;
use ExpenseRepository;
use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Type\TypeInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind(
        ClientInterface::class,
        ClientRepository::class,
        TypeInterface::class,
        TypeExpenseRepository::class,
        ExpenseInterface::class,
        ExpenseRepository::class,
    
    );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
