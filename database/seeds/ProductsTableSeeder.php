<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
			DB::table('products')->insert([
				'name' => Str::random(10),
				'brand_id' => rand(1, 4),
				'price' => rand(0, 99999999)/100
			]);
		}
    }
}
