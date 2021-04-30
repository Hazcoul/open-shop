<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'libelle'=>'Vetements',
            'description'=>' habillement',
        ]);

        Category::create([
            'libelle'=>'Cosmetique',
            'description'=>'Les produits de beautés',
        ]);

        Category::create([
            'libelle'=>'Alimentaire',
            'description'=>'Produits dediés à la consommantion',
        ]);
    }
}
