@component('mail::message')
{{-- # :equivaut à h1    ## : h2--}}
# Du nouveau sur OpenShop
## Un nouveau produit vient d\'être ajouter
Vous trouverez ci-dessous les infos sur le nouveau 
### Designation: {{ $produit->designation }}
### Designation: {{ $produit->prix }}
### Designation: {{ $produit->category->libelle }}
Pour commander, cliquez juste sur le bouton "commander"
{{-- @endproduction

The body of your message. --}}

@component('mail::button', ['url' => route("produits.show", $produit)])
Commander
@endcomponent

Merci d'avoir choisi OpenShop,<br>
{{ config('app.name') }}
@endcomponent
