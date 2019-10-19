<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

            $table->bigIncrements('id');
            $table->string('type', 50);

            $table->string("image")->nullable();
            $table->string("name", 100)->nullable();
            $table->string("gender")->nullable();
            $table->string("NIC", 15)->nullable();
            $table->string("Address", 100)->nullable();
            $table->date("DOB")->nullable();
            $table->boolean('admin')->default(0);
            $table->integer("salary")->nullable();
            $table->date("joindate")->nullable();

            $table->integer("tp")->nullable();
            $table->integer("tp2")->nullable();
            $table->string("Email", 50)->nullable();
            $table->integer("attendence")->nullable();

            $table->string("remark", 500)->nullable();

            $table->timestamps();

        });
        DB::statement("ALTER TABLE employees AUTO_INCREMENT = 1000;");


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
