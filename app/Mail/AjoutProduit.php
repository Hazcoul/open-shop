<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AjoutProduit extends Mailable
{
    use Queueable, SerializesModels;

    public $produit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produit)
    {
        //
        $this->produit=$produit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Pour personnaliser l'emetteur from("marketing@open-shop", "service marketing")
        return $this->subject("Du nouveau sur OpenShop")->from("marketing@open-shop", "service marketing")->markdown('emails.produits.ajout-produit');
        //return $this->subject("Du nouveau sur OpenShop")->markdown('emails.produits.ajout-produit');
        //si on cree soi meme sa vue, on fait return $this->view('nom de la vue');
    }
}
