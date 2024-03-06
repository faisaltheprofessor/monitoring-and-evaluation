<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemainingColumnsToMonthlyProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_progress', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('component_id')->nullable();
            $table->unsignedBigInteger('subcomponent_id')->nullable();
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->float('cumulative_progress')->nullable();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('component_id')->references('id')->on('components');
            $table->foreign('subcomponent_id')->references('id')->on('sub_components');
            $table->foreign('activity_id')->references('id')->on('activities');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_progress', function (Blueprint $table) {
            $table->dropForeign('monthly_progress_project_id_foreign');
            $table->dropForeign('monthly_progress_component_id_foreign');
            $table->dropForeign('monthly_progress_subcomponent_id_foreign');
            $table->dropForeign('monthly_progress_activity_id_foreign');

            $table->dropColumn('project_id');
            $table->dropColumn('component_id');
            $table->dropColumn('subcomponent_id');
            $table->dropColumn('activity_id');

        });
    }
}
