<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskaddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskadds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('RoomNo');
            $table->String('Date');
            $table->String('RoomType');
            $table->String('Task');
            $table->String('Housekeeper');
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
        Schema::dropIfExists('taskadds');
    }
}
