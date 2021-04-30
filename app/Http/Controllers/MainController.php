<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function accueil()
    {
        $collect1=collect([]);
        //dd('$collect1');
        $collect2=collect(["Mangue", "Ananas", "Orange", "Papaye"]);
        //dd($collect2);
        $user=User::orderByDesc('id')->first();

        $collectProduit=Produit::all();
        $produitsFiltres=$collectProduit->filter(function($value, $key){
            return $value->prix>2000 && $value->prix<100000;
        });
        //dd($produitsFiltres);
        $collect3=$collectProduit->sortByDesc('prix')->first();
        //dd($collect3);
        //dd($user->role);
        //dd($user->isAdmin());
        //dd('Ma page d\'accueil');
        $produits=Produit::orderByDesc('id')->take(9)->get();
        return view('welcome', ['produits'=>$produits]);
        # code...
    }
}
