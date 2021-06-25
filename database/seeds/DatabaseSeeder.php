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

        DB::table('categories')->insert([
            'name' => 'A.H. Las Monteros',
            'slug' => 'indio-5'
        ]);

        DB::table('categories')->insert([
            'name' => 'Asoc. Medalla de Guadalupe',
            'slug' => 'indio-6'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Tácala 4ta Etapa',
            'slug' => 'indio-7'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Tácala II Etapa',
            'slug' => 'indio-8'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Sagrado Corazon de Jesús',
            'slug' => 'indio-9'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Los Jardines',
            'slug' => 'indio-10'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Villa Nueva Talarita',
            'slug' => 'indio-11'
        ]);

        DB::table('categories')->insert([
            'name' => 'Ampliación Nuevo Talarita y sus Jazmines',
            'slug' => 'indio-12'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Pampas de Castilla',
            'slug' => 'indio-13'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Valle Sol',
            'slug' => 'indio-14'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Ciudad del Niño III Etapa',
            'slug' => 'indio-14'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Ciudad del Niño IV Etapa',
            'slug' => 'indio-15'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Ciudad del Niño II Etapa',
            'slug' => 'indio-16'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Las Mercedes',
            'slug' => 'indio-17'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. San Francisco de Asis',
            'slug' => 'indio-18'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Alas Peruanas',
            'slug' => 'indio-19'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Valle la Paz',
            'slug' => 'indio-20'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Madre Teresa de Calcuta I Etapa',
            'slug' => 'indio-21'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Madre Teresa de Calcuta II Etapa',
            'slug' => 'indio-22'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Los Libertadores',
            'slug' => 'indio-23'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Villa Chulucanas',
            'slug' => 'indio-24'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Villa Puerta del Sol',
            'slug' => 'indio-25'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Villa California',
            'slug' => 'indio-26'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Violeta Ruesta',
            'slug' => 'indio-27'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Los Cocos de Castilla',
            'slug' => 'indio-28'
        ]);

        DB::table('categories')->insert([
            'name' => 'Asoc. Pueblo Libre',
            'slug' => 'indio-29'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Hijos de Canchaque',
            'slug' => 'indio-30'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Chiclayito',
            'slug' => 'indio-31'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. La Primavera III Etapa',
            'slug' => 'indio-32'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Villa el Salvador',
            'slug' => 'indio-33'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Ciudad del Niño - Urbano',
            'slug' => 'indio-34'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío Miraflores',
            'slug' => 'indio-35'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío Río Seco',
            'slug' => 'indio-36'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío Chapaira',
            'slug' => 'indio-37'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío Terela',
            'slug' => 'indio-38'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío el Papayo',
            'slug' => 'indio-39'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío San Vicente',
            'slug' => 'indio-40'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío San Vicente',
            'slug' => 'indio-41'
        ]);

        DB::table('categories')->insert([
            'name' => 'Caserío La Obrilla',
            'slug' => 'indio-42'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 03 - San Gabriel',
            'slug' => 'indio-43'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 20 - Nuestra Señora de las Mercedes',
            'slug' => 'indio-44'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 22 - Señor De Chocán',
            'slug' => 'indio-45'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 25 - Virgen De Fátima',
            'slug' => 'indio-46'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 27 - Cruz De Caña',
            'slug' => 'indio-47'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 29 - Sagrado Corazón De Jesús',
            'slug' => 'indio-48'
        ]);

        DB::table('categories')->insert([
            'name' => 'KM 30 - San Martín De Porres',
            'slug' => 'indio-49'
        ]);

        DB::table('categories')->insert([
            'name' => 'Asoc. Quebrada Del Gallo',
            'slug' => 'indio-50'
        ]);

        DB::table('categories')->insert([
            'name' => 'Expredio Tácala',
            'slug' => 'indio-51'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Los Tallanes',
            'slug' => 'indio-52'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Santa Clara',
            'slug' => 'indio-53'
        ]);

        DB::table('categories')->insert([
            'name' => 'Asoc. Villa Jerusalen',
            'slug' => 'indio-54'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Villa Arenas',
            'slug' => 'indio-55'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Libertadores II Etapa',
            'slug' => 'indio-56'
        ]);

        DB::table('categories')->insert([
            'name' => 'ExPredio Miraflores Sector G',
            'slug' => 'indio-57'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Señor Cautivo  - Alto Huaquillas',
            'slug' => 'indio-58'
        ]);

        DB::table('categories')->insert([
            'name' => 'Asoc. Madre Teresa De Calcuta',
            'slug' => 'indio-59'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Luis Ramirez',
            'slug' => 'indio-60'
        ]);

        DB::table('categories')->insert([
            'name' => 'Upis Bella Rica',
            'slug' => 'indio-61'
        ]);

        DB::table('categories')->insert([
            'name' => 'A.H. Ciudad del Niño - Rural',
            'slug' => 'indio-62'
        ]);
    }
}
