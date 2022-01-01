<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger("fee_category_id");
            $table->tinyInteger("Class_id");
            $table->tinyInteger("fees_amount");
            $table->tinyInteger("status")->default("1");
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
        Schema::dropIfExists('fees_amounts');
    }
}
