<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $produit=Produit::create([
        //     'designation'=>'carowhite',
        //     'prix'=>3000,
        //     'description'=>'fffff',
        //     'quantite'=>200,

        // ]);
        //
        Produit::factory(500)->create();
    }
}
