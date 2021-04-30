<?php

namespace App\Exports;

use App\Models\Produit;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitExport implements FromView
//class ProduitExport implements FromCollection, FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Produit::all();
    // }
    public function view():View
    {
        return view('partials._produits-table', ['produits'=>Produit::all(),]);
    }
}
