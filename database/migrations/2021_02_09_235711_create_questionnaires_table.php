<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('component_id')->nullable();
            $table->unsignedBigInteger('subcomponent_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->text('kobo_link');
            $table->text('form_link');
            $table->text('description')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('component_id')->references('id')->on('components');
            $table->foreign('subcomponent_id')->references('id')->on('sub_components');
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->unsignedBigInteger('user_id')->nullable();

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
        Schema::dropIfExists('questionnaires');
    }
}
