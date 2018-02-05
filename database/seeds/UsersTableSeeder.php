<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
        	'name' => 'Rasel',
        	'email' => 'rasel@gmail.com',
        	'password' => Hash::make('1234'),
        ]);

    	$faker = Faker\Factory::create();

    	for($i=0; $i<10; $i++) {
	    	
	    	User::create([
	    		'name' => $faker->name,
	    		'email' => $faker->email,
	    		'password' => Hash::make($faker->password)
	    	]);
	    }
    }
}
