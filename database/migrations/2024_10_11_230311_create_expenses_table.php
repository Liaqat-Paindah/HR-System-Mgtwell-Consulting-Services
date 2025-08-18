<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
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
            $table->string('title'); // Description of the expense
            $table->string('description')->nullable(); // Description of the expense (now nullable)
            $table->string('quantity')->nullable(); // Quantity of the expense (now nullable)
            $table->decimal('amount')->nullable(); // Amount spent (now nullable)
            $table->date('date')->nullable(); // Date of the expense (now nullable)
            $table->string('status')->default('Pending'); // Status of the expense
            $table->string('scanned')->nullable(); // Status of the expense
            $table->string('rec_id')->nullable(); // Category of the expense (e.g., food, travel)
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
}
