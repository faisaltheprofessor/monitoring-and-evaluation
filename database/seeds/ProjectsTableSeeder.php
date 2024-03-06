<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('projects')->insert([
            [
                'name' => 'Community Livestock Agriculture Program',
                'name_dari' => 'د خلکو په گډون د زراعت او مالداری پروګرام',
                'abbreviation' => 'CLAP',
                'user_id' => 1
            ],
            [
                'name' => 'Support Priority National Program2',
                'name_dari' => 'سنپ۲',
                'abbreviation' => 'SNaPP2',
                'user_id' => 1
            ]
            ]
        );
    }
}
