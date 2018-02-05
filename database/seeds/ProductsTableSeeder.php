<?php

use Illuminate\Database\Seeder;
use App\Model\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        for($i=0; $i<50; $i++) {

        	Product::create([
        		'title' => $faker->sentence(6, true),
        		'description' => $faker->text(1000),
        		'price' => $faker->randomFloat(2, 100, 1000)
        	]);
        }
    }
}
