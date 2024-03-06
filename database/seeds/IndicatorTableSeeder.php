<?php

use Illuminate\Database\Seeder;

class IndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('indicators')->insert([
            'name' => 'No. of assesments conducted',
            'name_dari' => 'تعداد اسسمنت',
            'user_id' => 1
        ]);
    }
}
