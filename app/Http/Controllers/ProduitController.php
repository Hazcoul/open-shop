<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use App\Mail\AjoutProduit;
use Illuminate\Http\Request;
use App\Exports\ProduitExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\NouveauProduit;
use App\Http\Requests\ProduitFormRequest;

class ProduitController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','isAdmin'])->except(['index', 'show']);
    }
    // public function export()
    // {
    //    //dd('export');
    // }
    // Route::middleware(['auth','isAdmin'])->group(function(){
//     Route::resource('produits', ProduitController::class);
// }); idem à la fonction _construct() 
//avec pour particularité la possibilité de rendre d'autres vue visible aux autres users
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeProduit=Produit::orderByDesc('id')->paginate(10);
        return view('font-office/produits/index', ['produits'=>$listeProduit]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $categories=Category::all();
        $produit=new Produit();
        return view('font-office/produits/create', compact('categories','produit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {
        //Pour en registrer un produit
        //avec la methode validate 
        //on peut utiliser un tableau  ou une chaine de caractère pour definir les règles
        //ex: "designation"=>"regle1|regle2|regle3",
        //ou "designation"=> [regle1.....]
       // dd($request->file('image')->getClientOriginalName());
        $imageName='produit.png';
        if($request->file('image')){
            $imageName=time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/produits',$imageName);
        }

        //dd($request->all());
        $idProduit=Produit::create([
            'designation'=>$request->designation,
            'prix'=>$request->prix,
            'quantite'=>$request->quantite,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$imageName,
        ]);
        //on peut renseigner $user->email
        $user=User::first();
        Mail::to($user)->send(new AjoutProduit($idProduit));

        return redirect()->route('produits.show', $idProduit)->with('statut', 'Produit enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //detail de produit
        return view('font-office/produits/show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories=Category::all();
        return view('font-office/produits/edit', ['produit'=>$produit, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        $imageName='produit.png';
        if($request->file('image')){
            $imageName=time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/produits',$imageName);
        }
       $produit= Produit::where('id',$id)->update([
            'designation'=>$request->designation,
            'prix'=>$request->prix,
            'quantite'=>$request->quantite,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$imageName,
        ]);

        $user=User::first();
        $produit=Produit::orderByDesc('id')->first();
        $user->notify(new NouveauProduit($produit));
        
        return redirect()->route('produits.show', $id)->with('statut', 'Produit modifié avec succès');
        // $user=User::first();
        
        // $user->notify(new NouveauProduit($produit));
        // return redirect()->route('produits.show', $id)->with('statut', 'Produit modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);
        return redirect()->route('produits.index', $id)->with('statut', 'Produit supprimé avec succès');
    }

    public function export()
    {
        return Excel::download(new ProduitExport(), 'produits.xlsx');
    }

    
}
