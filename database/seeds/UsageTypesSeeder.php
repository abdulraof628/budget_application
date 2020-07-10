<?php

use Illuminate\Database\Seeder;

class UsageTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('usage_types')->insert([
            [
                'type_name' => 'Procurement',
            ],
            [
                'type_name' => 'Payment',
            ],
        ]);
    }
}
