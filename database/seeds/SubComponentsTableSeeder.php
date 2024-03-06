<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_components')->insert([
            [
                'name' => 'Training in Villages',
                'name_dari' => 'تریننګ در قریه ',
                'user_id' => 1,
                'project_id' => 1,
                'component_id' => 1
            ],
            [
                'name' => 'Awareness in Villages',
                'name_dari' => 'خبرداری در قریه ',
                'user_id' => 1,
                'project_id' => 2,
                'component_id' => 2
            ]

        ]);
    }
}
