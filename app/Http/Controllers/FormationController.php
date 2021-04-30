<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        // $produits=Produit::all();
        // $produitArecupere=Produit::first();
        // $produitArecupere2=Produit::where('id', 2)->first();
        // $produitArecupere3=Produit::where('prix', 1250)->get();
        // $produitArecupere4=Produit::where('quantite', '<', 1250)->get();
        // $produitArecupere5=Produit::where(['quantite'=> 70, 'prix'=>1250])->get();
        // $produitArecupere6=Produit::where('quantite', '<', 1250)->where('quantite', '!=', 1250)->get();
        // dd($produitArecupere2);
        # code...
        $produitArecupere=Produit::first();
        $user1=User::first();
        $user1->produits()->attach($produitArecupere);
        dd($user1->produits);


        $category1=Category::first();
        $produitArecupere->category_id=$category1->id;
        $produitArecupere->save();
        dd($produitArecupere->category);
    }
    //
    public function ajouterProduit()
    {
        # code...
        $produit=new Produit();
        $produit->designation='Ever shine';
        $produit->prix=1250;
        $produit->description='Produits cosmetique à base de cacao';
        $produit->quantite=70;
        $produit->save();
        dd($produit);
    }
    public function ajouterProduit2()
    {
        # code...
       $produit=Produit::create([
            'designation'=>'thalium',
            'prix'=>2000,
            'description'=>'Déodorant',
            'quantite'=>100,

        ]);
        dd($produit);
    }
    public function updateProduit()
    {
        $produitAmodif=Produit::first();
        $produitAmodif->designation='Ever shine';
        $produitAmodif->prix=2000;
        $produitAmodif->description='Produits cosmetique à base de cacao';
        $produitAmodif->quantite=120;
        $produitAmodif->save();
        dd($produitAmodif);
        # code...
    }
    public function updateProduit2()
    {
        //find permet de retrouver le produit 2
        $produitAmodif2=Produit::find(2);

        dd('ça marche');
        # code...
    }
    public function updateProduit3($id)
    {
         //on peut forcer l'utilisateur à passer un int (public function updateProduit3(int $id))
        //find permet de retrouver le produit 2, on peut utiliser findOrfail() à la place de find
        $produitAmodif3=Produit::findOrFail($id);

        dd($produitAmodif3->designation);
        # code...
    }
    public function updateProduit4(Produit $produit)
    {
        $result=Produit::where('id', $produit->id)->update([
            'designation'=>"sensesd",
            'prix'=>10000,
            'description'=>'nouveau produit',
            'quantite'=>90,
        ]);
        dd($produit->designation, $result);
        # code...
    }
    public function supprimerProduit()
    {
       $result=Produit::destroy(2);
       dd($result);
        # code...
    }
}
