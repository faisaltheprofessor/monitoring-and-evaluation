<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrrigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irrigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('scheme_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('ia_id');
            $table->string('start_point_lat');
            $table->string('start_point_long');
            $table->string('end_point_lat');
            $table->string('end_point_long');
            $table->integer('total_command_area')->nullable();
            $table->integer('irrigated_area')->nullable();
            $table->integer('nonirrigated_area')->nullable();
            $table->integer('direct_beneficiaries')->nullable();
            $table->integer('indirect_beneficiaries')->nullable();
            $table->float('engineering_estimated_cost')->nullable();
            $table->float('engineering_estimated_cost_usd')->nullable();
            $table->float('project_status')->nullable();
            $table->float('contract_cost')->nullable();
            $table->float('contract_cost_usd')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('scheme_id')->references('id')->on('schemes');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('ia_id')->references('id')->on('ias');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('irrigations');
    }
}
