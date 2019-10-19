<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cid')->unsigned();
            $table->foreign('cid')->references('id')->on('customers');

            $table->integer('room_no');
            $table->foreign('room_no')->references('id')->on('rooms');

            $table->integer('t_id');
            $table->foreign('t_id')->references('id')->on('room_types');

            $table->timestamp('resereved_date_time')->useCurrent();
            $table->date('check_in');
            $table->date('check_out');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
