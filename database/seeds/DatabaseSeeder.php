<?php

use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class, 1)
        	->create(['email' => 'eddyjaair@gmail.com']);

        factory(Category::class, 5)->create();
    }
}
