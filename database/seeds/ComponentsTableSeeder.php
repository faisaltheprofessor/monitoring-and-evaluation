<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([
            [
                'name' => 'Institutional Development',
                'name_dari' => 'انکشاف و توسعه نهادی',
                'user_id' => 1,
                'project_id' => 2
            ],
            [
                'name' => 'Strategic Investment',
                'name_dari' => 'سرمایه گذاری استراتیژیک',
                'user_id' => 1,
                'project_id' => 2
            ],
            [
                'name' => 'Policy and Implementation Support Facility',
                'name_dari' => 'پالیسی و تسهیل همکاری در تطبیق پروژه ها',
                'user_id' => 1,
                'project_id' => 2
            ],

        ]);
    }
}
