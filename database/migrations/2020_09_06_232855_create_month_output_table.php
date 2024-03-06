<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_output', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('output_id');
            $table->unsignedBigInteger('month_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('progress');
            // $table->integer('remarks')->nullable();
            $table->foreign('month_id')->references('id')->on('months');
            $table->foreign('output_id')->references('id')->on('outputs');
            // $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('month_output');
    }
}
