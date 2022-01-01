<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeSalaryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_salary_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("employe_id")->comment("employe_id=user_id");;
            $table->integer("previous_salary")->nullable();;
            $table->integer("present_salary")->nullable();;
            $table->integer("increment_salary")->nullable();;
            $table->date("effected_date")->nullable();
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
        Schema::dropIfExists('employe_salary_logs');
    }
}
