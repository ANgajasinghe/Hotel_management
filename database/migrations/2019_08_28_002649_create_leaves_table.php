<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves',
            function (Blueprint $table) {
                $table->integer('id');
                $table->primary(['id', 'Requesting_date']);
                $table->date("Requesting_date");
                $table->date('leaving_date')->nullable();
                $table->integer('nof_days')->nullable();
                $table->string("leve_type");
                //$table->foreign("leve_type")->references("leve_type")->on("leave_types");
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
        Schema::dropIfExists('leaves');
    }
}
