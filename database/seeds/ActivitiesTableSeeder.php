<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
           [
               'name' => 'Training of farmers regarding Wheat',
               'name_dari' => 'تریننګ دهاقین در ګندم',
               'user_id' => 1,
               'subcomponent_id' => 1,
               'component_id' => 1,
               'project_id' => 1,
               'unit_id' => 1
           ],
            [
                'name' => 'Awareness of farmers regarding Wheat',
                'name_dari' => 'خبردازی دهاقین در ګندم',
                'user_id' => 1,
                'subcomponent_id' => 2,
                'component_id' => 2,
                'project_id' => 2,
                'unit_id' => 1
            ]
        ]);
    }
}
