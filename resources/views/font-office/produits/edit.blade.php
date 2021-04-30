              <x-master-layout>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Modification d'un produit existant</h1>
                                <hr>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form method="post" action="{{ route('produits.update',$produit) }}" enctype="multipart/form-data">
                                    @method("PUT")
                                    @include('partials._produit-form')
                                </form>
                            </div>
                        </div>
                
                    </div>
                </x-master-layout>