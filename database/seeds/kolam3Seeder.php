<?php

use Illuminate\Database\Seeder;

class kolam3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kolam')->insert([
        	'kolam' => 'kolam3',
        	'suhu' => 15,
        	'ph' => 20
        ]);
    }
}
