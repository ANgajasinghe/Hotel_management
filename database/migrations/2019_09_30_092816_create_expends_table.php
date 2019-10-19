<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('amount');
            $table->dateTime('date');
            /*$table->integer('oid')->unsigned();
            $table->foreign('oid')->references('id')->on('orders');*/
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
        Schema::dropIfExists('expends');
    }
}
