<?php

use PhpParser\Node\Expr\AssignOp\Mod;

if(!function_exists('nb_produit')){
   function nb_produit($nb)
    {
        if($nb>1){
            return $nb.' produits';
        }else{
            return $nb.' produit'; 
        }
    }
}

if(!function_exists('prix_format')){
    // function prix_format($prix)
    //  {
    //      $nb_chiffre=count($prix);
    //      if($nb_chiffre%3==0){

    //      }
    //  }
    function prix_format($prix){
        return number_format($prix,0,'',' ')." FCFA";
        
    }
}