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
        $this->call(ApplicationItemTypesSeeder::class);
        $this->call(BudgetTypesSeeder::class);
        $this->call(UsageTypesSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
