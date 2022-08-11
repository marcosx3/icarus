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
        // criar uma tabela para receita e outra para despesa? cada uma com data etc? 
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained('clients')
                ->onDelete()
                ->onUpdate();
            $table->foreignId('expenses_id')
                ->constrained('expenses')
                ->onDelete()
                ->onUpdate();
            $table->foreignId('revenues_id')
                ->constrained('revenues_id')
                ->onDelete()
                ->onUpdate();
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
        Schema::dropIfExists('finances');
    }
};
