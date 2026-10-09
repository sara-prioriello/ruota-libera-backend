<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    

    public function run(): void{


        $brands = [
            'Bianchi',
            'Pinarello',
            'Specialized',
            'Trek',
            'Cannondale'
        ];

        $countries = [
            'Italia',
            'Italia',
            'Stati Uniti',
            'Stati Uniti',
            'Stati Uniti'
        ];

        $founded_years = [
            1885,
            1952,
            1974,
            1976,
            1971
        ];

        $descriptions = [
            'Il marchio di biciclette più antico ancora in attività, famoso per il suo colore celeste.',
            'Storico marchio trevigiano, sinonimo di bici da corsa ad alte prestazioni.',
            "Azienda californiana nota per l'innovazione nelle mountain bike e nelle bici da strada.",
            'Uno dei più grandi produttori al mondo, con una gamma che copre ogni disciplina.',
            'Pioniere dei telai in alluminio, apprezzato per le sue soluzioni tecniche originali.'
            
        ];

    
        
        foreach ($brands as $index => $brand) {
            $newBrand = new Brand();
            $newBrand->name = $brand;
            $newBrand->country = $countries[$index];
            $newBrand->founded_year = $founded_years[$index];
            $newBrand->description = $descriptions[$index];
            $newBrand->save();
        }
    }
}
