<?php

use Illuminate\Database\Seeder;

class BeneficiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beneficiaries')->insert([
            'name' => 'Onfarm Water Management Program',
            'name_dari' => 'پروژه اداره آب آنفارم',
            'abbreviation' => 'OFWMP',
            'description' => 'Added by seeding the database',
            'user_id' => 1
        ]);
    }
}
