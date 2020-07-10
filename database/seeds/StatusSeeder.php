<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            [
                'status_name' => 'Approved',
            ],
            [
                'status_name' => 'Rejected',
            ],
            [
                'status_name' => 'In-Progress',
            ],
        ]);
    }
}
