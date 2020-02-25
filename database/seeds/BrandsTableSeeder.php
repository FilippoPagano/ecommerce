<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i = 0; $i < 4; $i++) {
			DB::table('brands')->insert([
				'name' => Str::random(10)
			]);
		}
    }
}
