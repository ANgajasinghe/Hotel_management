<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('eid');
            $table->string('name');
            $table->date("Requesting_date")->nullable();
            $table->date('leaving_date')->nullable();
            $table->integer('nof_days')->nullable();
            $table->string("leve_type");
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
        Schema::dropIfExists('requested_leaves');
    }
}
