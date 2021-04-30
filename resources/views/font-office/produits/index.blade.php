<x-master-layout>
    <div class="container">

        
        <div class="row">
            @if(session('statut'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('statut') }}</strong> 
                </div>
            </div>
            @endif
            
            <div class="col-md-12">
                <h1 class="text-center mt-3">Tous nos produits</h1>
                <hr/>

                <h5 class="text-center">Notre catalogue comporte {{ nb_produit(2) }}</h5>

                @if(Auth::user()!=null && Auth::user()->isAdmin())
                <div class="mb-2">
                    <a class="btn btn-secondary btn-sm" href="{{ route('produits.create') }}"><i class="fas fa-plus    "></i> Nouveau</a>
                </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>Désignation</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                         
                        <tr>
                            <td scope="row">{{ $produit->designation }}</td>
                            <td>{{ prix_format($produit->prix)}}</td>
                            <td>{{ $produit->quantite }}</td>
                            <td>{{ $produit->description }}</td>
                            <td class="d-flex">
                                <a class="btn btn-info btn-sm mr-2" href="{{ route('produits.show', $produit) }}"><i class="fas fa-eye    "></i></a>
                                @if(Auth::user()!=null && Auth::user()->isAdmin())
                                <a class="btn btn-warning btn-sm mr-2" href="{{ route('produits.edit', $produit) }}"><i class="fas fa-edit    "></i></a>
                                {{-- <a onclick="event.preventDefault(); if(confirm('Etes-vous sûr de vouloir supprimer ce produit?')); document.getElementById('{{ $produit->id }}').submit()" class="btn btn-danger btn-sm" href="{{ route('produits.destroy',$produit) }}"> <i class="fas fa-trash   "></i></a>
                                <form id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy',$produit) }}">
                                    @csrf
                                    @method("DELETE")
                                </form> --}}
                                <a onclick="event.preventDefault(); delConfirm('{{ $produit->id }}')" class="btn btn-danger btn-sm" href="{{ route('produits.destroy',$produit) }}"> <i class="fas fa-trash   "></i></a>
                                <form id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy',$produit) }}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr> --}}
                    </tbody>
                </table>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="">
                        {{ $produits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>