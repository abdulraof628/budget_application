<?php

use Illuminate\Database\Seeder;

class BudgetTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('budget_types')->insert([
            [
                'type_name' => 'OCAR',
            ],
            [
                'type_name' => 'BM',
            ],
        ]);
    }
}
