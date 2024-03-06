<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('provinces')->insert([
            'name' => 'Kabul',
            'name_dari' => 'کابل',
            'user_id' => 1
        ]);
    }
}
