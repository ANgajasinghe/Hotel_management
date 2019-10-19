<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_reports', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('customer_name');
            $table->date('event_date');
            $table->integer('event_time');
            $table->string('event_manager');
            $table->integer('attendence');
            $table->double('cost');
            $table->double('etotal');
            $table->double('btotal');


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
        Schema::dropIfExists('event_reports');
    }
}
