<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('districts')->insert([
            'name' => 'Khakhe Jabbar',
            'name_dari' => 'خاک جبار',
            'province_id' => 1,
            'user_id' => 1
        ]);
    }
}
