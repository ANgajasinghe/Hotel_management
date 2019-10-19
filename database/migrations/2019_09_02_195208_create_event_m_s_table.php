<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_m_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu_name');
            $table->string('menu_type');
            $table->longText('main_dishes');
            $table->longText('salads');
            $table->longText('deserts');
            $table->longText('beverages');
            $table->double('price');

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
        Schema::dropIfExists('event_m_s');
    }
}
