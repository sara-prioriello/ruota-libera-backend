<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Bike;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;

class BikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $bikes =[
        [
            'name' => 'Stumpjumper',
            'brand' => 'Specialized',
            'category' => 'Mountain Bike',
            'year' => 2024,
            'price' => 4299.00,
            'weight' => 14.2,
            'frame_material' => 'Carbonio',
            'features' => ['Freni a disco', 'Tubeless ready', 'Biammortizzata'],
            'description' => 'Mountain bike biammortizzata da trail, agile in salita e sicura nelle discese tecniche.'
        ],
        [
            'name' => 'Marlin 7',
            'brand' => 'Trek',
            'category' => 'Mountain Bike',
            'year' => 2024,
            'price' => 1099.00,
            'weight' => 14.5,
            'frame_material' => 'Alluminio',
            'features' => ['Freni a disco', 'Sospensione anteriore'],
            'description' => 'Front ideale per iniziare, robusta e affidabile sui sentieri di ogni giorno.'
        ],
        [
            'name' => 'Dogma F',
            'brand' => 'Pinarello',
            'category' => 'Bici da Corsa',
            'year' => 2024,
            'price' => 13500.00,
            'weight' => 6.8,
            'frame_material' => 'Carbonio',
            'features' => ['Freni a disco', 'Cambio elettronico', 'Tubeless ready'],
            'description' => 'Il modello di punta Pinarello, scelto dai professionisti per le grandi corse a tappe.'
        ],
        [
            'name' => 'Oltre',
            'brand' => 'Bianchi',
            'category' => 'Bici da Corsa',
            'year' => 2024,
            'price' => 7999.00,
            'weight' => 7.4,
            'frame_material' => 'Carbonio',
            'features' => ['Freni a disco', 'Cambio elettronico'],
            'description' => 'Telaio aerodinamico pensato per la massima velocità in pianura.'
        ],
        [
            'name' => 'CAAD13',
            'brand' => 'Cannondale',
            'category' => 'Bici da Corsa',
            'year' => 2023,
            'price' => 2299.00,
            'weight' => 8.4,
            'frame_material' => 'Alluminio',
            'features' => ['Freni a disco'],
            'description' => 'Telaio in alluminio leggero e reattivo, con un ottimo rapporto qualità prezzo.'
        ],
        [
            'name' => 'Turbo Vado',
            'brand' => 'Specialized',
            'category' => 'Bici Elettrica',
            'year' => 2024,
            'price' => 4499.00,
            'weight' => 25.0,
            'frame_material' => 'Alluminio',
            'features' => ['Freni a disco','Pedalata assistita', 'Sospensione anteriore'],
            'description' => 'E-bike da città e trekking, con motore potente e batteria a lunga autonomia.'
        ],
        [
            'name' => 'Arcadex',
            'brand' => 'Bianchi',
            'category' => 'Gravel',
            'year' => 2023,
            'price' => 3499.00,
            'weight' => 9.3,
            'frame_material' => 'Carbonio',
            'features' => ['Freni a disco','Tubeless ready'],
            'description' => 'Gravel veloce e leggera, perfetta per lunghe uscite su strade bianche.'
        ],
           [
            'name' => 'Checkpoint SL 5',
            'brand' => 'Trek',
            'category' => 'Gravel',
            'year' => 2024,
            'price' => 3299.00,
            'weight' => 9.2,
            'frame_material' => 'Carbonio',
            'features' => ['Freni a disco','Tubeless ready'],
            'description' => 'Gravel versatile, pronta per il bikepacking e le avventure di più giorni.'
        ]

    ];

    
        foreach ($bikes as $bike) {
            $newBike = new Bike();
            $newBike->name = $bike['name'];
            $newBike->year = $bike['year'];
            $newBike->price = $bike['price'];
            $newBike->weight = $bike['weight'];
            $newBike->frame_material = $bike['frame_material'];
            $newBike->description = $bike['description'];
            $newBike->slug = Str::slug($bike['name']);
            $newBike->category_id = Category::where('name', $bike['category'])->first()->id;
            $newBike->brand_id = Brand::where('name', $bike['brand'])->first()->id;
            $newBike->save();

            // Associa le features alla bici
            foreach ($bike['features'] as $featureName) {
                $feature = Feature::where('name', $featureName)->first();
                if ($feature) {
                    $newBike->features()->attach($feature->id);
                }
            }
        }
    }
}
