<?php

use Illuminate\Database\Seeder;

class kolam4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kolam')->insert([
        	'kolam' => 'kolam4',
        	'suhu' => 18,
        	'ph' => 12
        ]);
    }
}
