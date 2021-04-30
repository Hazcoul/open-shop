<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //permet de creer des actions
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->unique();
            $table->integer('prix');
            $table->text('description')->nullable();
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //supprimer les actions creer dans up
        Schema::dropIfExists('produits');
    }
}