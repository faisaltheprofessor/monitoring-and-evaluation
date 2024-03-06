<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(ComponentsTableSeeder::class);
        $this->call(SubComponentsTableSeeder::class);
        // $this->call(ActivitiesTableSeeder::class);
        // $this->call(BeneficiariesTableSeeder::class);
        // $this->call(ImplementingPartnerTableSeeder::class);
        // $this->call(ProvinceTableSeeder::class);
        // $this->call(DistrictTableSeeder::class);
        // $this->call(VillageTableSeeder::class);
        // $this->call(IndicatorTableSeeder::class);

    }
}
