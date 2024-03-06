<?php

use Illuminate\Database\Seeder;

class VillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('villages')->insert([
            'name' => 'Taghar',
            'name_dari' => 'ټغر',
            'province_id' => 1,
            'user_id' => 1,
            'district_id' => 1
        ]);
    }
}
