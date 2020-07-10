<?php

use Illuminate\Database\Seeder;

class ApplicationItemTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_item_types')->insert([
            [
                'item_type_name' => 'Asset',
            ],
            [
                'item_type_name' => 'Service',
            ],
        ]);
    }
}
