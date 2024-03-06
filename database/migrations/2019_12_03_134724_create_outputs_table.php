<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('activity_id')->nullable();;
            $table->unsignedBigInteger('project_id')->nullable();;
            $table->unsignedBigInteger('component_id')->nullable();;
            $table->unsignedBigInteger('subcomponent_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('quantity')->nullable();;
            $table->text('description')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->integer('cost')->nullable();
            $table->text('long_start')->nullable();
            $table->text('long_end')->nullable();
            $table->text('lat_start')->nullable();
            $table->text('lat_end')->nullable();
            $table->unsignedBigInteger('implementing_partner_id')->nullable();
            $table->unsignedBigInteger('direct_beneficiary_id')->nullable();
            $table->unsignedBigInteger('indirect_beneficiary_id')->nullable();
            $table->unsignedBigInteger('indicator_id')->nullable();
            $table->text('command_area')->nullable();
            $table->text('remarks')->nullable();
            $table->text('output_details')->nullable();
            $table->float('progress')->default(0)->nullable();
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('component_id')->references('id')->on('components');
            $table->foreign('subcomponent_id')->references('id')->on('sub_components');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('implementing_partner_id')->references('id')->on('implementing_partners');
            $table->foreign('direct_beneficiary_id')->references('id')->on('beneficiaries');
            $table->foreign('indirect_beneficiary_id')->references('id')->on('beneficiaries');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('indicator_id')->references('id')->on('indicators');
            $table->foreign('unit_id')->references('id')->on('units');

//            province
//            district`
//            viallage (optional)
//                cost

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
        Schema::dropIfExists('outputs');
    }
}
