<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
            ->constrained('clients')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreignId('type_expense_id')
            ->constrained('type_expenses')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->text('expense_name');
            $table->decimal('expense_value');
            $table->date('expense_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
