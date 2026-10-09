<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $categories = [
            'Mountain Bike',
            'Bici da Corsa',
            'Bici Elettrica',
            'Gravel'
            
        ];

        $colors = [
            '#2E7D32',
            '#C62828',
            '#1565C0',
            '#6D4C41'

        ];

        $descriptions = [
            'Pensata per i sentieri fuoristrada, con coperture larghe e sospensioni per affrontare i terreni più accidentati.',
            'Leggera e aerodinamica, progettata per la velocità e le lunghe distanze su strada asfaltata.',
            'Dotata di un motore a pedalata assistita che rende facili le salite e i lunghi tragitti quotidiani.',
            'Versatile e robusta, unisce la velocità della bici da strada alla capacità di muoversi su sterrato e ghiaia.'
        ];

        foreach ($categories as $index => $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->color = $colors[$index];
            $newCategory->description = $descriptions[$index];
            $newCategory->save();
        }

    }
}
