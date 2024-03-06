<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'first_name' => 'Faisal',
                'last_name' => 'khan',
                'email' => 'faisalfazily@gmail.com',
                'password' => bcrypt('faisal123')
            ],
                [
                    'first_name' => 'M. Asef',
                    'last_name' => 'Nekzad',
                    'email' => 'asef.nikzad@mail.gov.af',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Habibullah ',
                    'last_name' => 'Omerkhil',
                    'email' => 'habibdeallah@gmail.com',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Noor Agha',
                    'last_name' => 'Nawakht',
                    'email' => 'nooragha_nawasht@yahoo.com',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Noor',
                    'last_name' => 'Ahmad',
                    'email' => 'noor_masoud1234@yahoo.com',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Zabiullah',
                    'last_name' => 'Mujaid',
                    'email' => 'Zmujahed786@gmail.com',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Daud',
                    'last_name' => 'Hilal',
                    'email' => 'daud.hilal@mail.gov.af',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Asadullah',
                    'last_name' => 'Battar',
                    'email' => 'asad.battar@mail.gov.af',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Noor Akbar',
                    'last_name' => 'Sarak',
                    'email' => 'noor.srak@mail.gov.af',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Hameedullah',
                    'last_name' => 'Momand',
                    'email' => 'hameed.momand@mail.gov.af',
                    'password' => bcrypt('secret')
                ],
                [
                    'first_name' => 'Ahmad Reshad',
                    'last_name' => 'Ibrahimi',
                    'email' => 'reshad.ibrahimi@mail.gov.af',
                    'password' => bcrypt('secret')
                ],
          ]
        );
    }
}
