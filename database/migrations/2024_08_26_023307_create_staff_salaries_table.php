    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('rec_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('tax')->nullable();
            $table->string('net_salary')->nullable();
            $table->string('month')->nullable();
            $table->string('days')->nullable();
            $table->string('year')->nullable();
            $table->string('leaves')->nullable();
            $table->string('paiddays')->nullable();
            $table->string('code')->nullable();
            $table->string('net_amount')->nullable();

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
        Schema::dropIfExists('staff_salaries');
    }
}
