@component('mail::message')
{{-- # :equivaut à h1    ## : h2--}}
# Du nouveau sur OpenShop
## Un produit vient d\'être modifier
Vous trouverez ci-dessous les infos sur le nouveau 
### Designation: {{ $produit->designation }}
### Designation: {{ $produit->prix }}
### Designation: {{ $produit->category->libelle }}
Pour commander, cliquez juste sur le bouton "commander"

{{-- The body of your message. --}}

@component('mail::button', ['url' => route("produits.show", $produit)])
Commander
@endcomponent

Merci d'avoir choisi OpenShop,<br>
{{ config('app.name') }}
@endcomponent
