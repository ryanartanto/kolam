<?php

use Illuminate\Database\Seeder;

class kolam2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kolam')->insert([
        	'kolam' => 'kolam2',
        	'suhu' => 21,
        	'ph' => 20
        ]);
    }
}
