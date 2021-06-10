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

        // factory(Category::class, 5)->create();
        DB::table('categories')->insert([
            'name' => 'Asoc. 04 de Mayo',
            'slug' => 'indio'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Campo Polo',
            'slug' => 'indio-2'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. El Indio',
            'slug' => 'indio-3'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Nuevo Horizonte',
            'slug' => 'indio-4'
        ]);
    }
}
