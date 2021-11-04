<?php

use Illuminate\Database\Seeder;

class kolam1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kolam')->insert([
        	'kolam' => 'kolam1',
        	'suhu' => 25,
        	'ph' => 10
        ]);
    }
}
