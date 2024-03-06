<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->insert(
            [
                [
                    'name' => 'Read',
                    'guard_name' => 'web'
                ],

                [
                    'name' => 'Write',
                    'guard_name' => 'web'
                ],
                [
                    'name' => 'Modify',
                    'guard_name' => 'web'
                ],
                [
                    'name' => 'View',
                    'guard_name' => 'web'
                ],
                [
                    'name' => 'Create',
                    'guard_name' => 'web'
                ],

            ]
        );
    }
}
