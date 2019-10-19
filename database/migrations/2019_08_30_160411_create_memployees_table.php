<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memployees', function (Blueprint $table) {
            $table->integer('id');
            $table->string('type');
            $table->string('name');
            $table->string('day');
            $table->string('month');
            $table->primary(['id', 'type', 'day', 'month']);
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
        Schema::dropIfExists('memployees');
    }
}
