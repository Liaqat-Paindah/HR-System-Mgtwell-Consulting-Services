<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('birth_date')->nullable();
            $table->string('nid')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('tin')->nullable();
            $table->string('phone')->nullable();
            $table->string('account_number')->nullable();
            $table->string('position')->nullable();
            $table->string('gender')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('project')->nullable();
            $table->string('address')->nullable();
            $table->string('work_station')->nullable();
            $table->string('category')->nullable();
            $table->string('step')->nullable();
            $table->string('gross_salary')->nullable();
            $table->string('tax')->nullable();
            $table->string('net_salary')->nullable();
            $table->string('profile')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
