<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImplementingPartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('implementing_partners')->insert([
            'name' => 'Afghanistan Agricultural Inputs Projects',
            'name_dari' => 'پروژه عوامل تولید زراعتی افغانیستان',
            'abbreviation' => 'AAIP',
            'description' => 'Added by seeding the database',
            'user_id' => 1
        ]);
    }
}
