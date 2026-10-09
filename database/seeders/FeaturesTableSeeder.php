<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $features = [
            'Freni a disco',
            'Tubeless ready',
            'Sospensione anteriore',
            'Biammortizzata',
            'Pedalata assistita',
            'Cambio elettronico'
        ];
    
        foreach ($features as $feature) {
            $newFeature = new Feature();
            $newFeature->name = $feature;
            $newFeature->save();
        }
    }

}
