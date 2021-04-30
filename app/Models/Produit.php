<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public $fillable=['designation', 'prix', 'description', 'quantite', 'category_id', 'image'];
    use HasFactory;

public function category()
{
    # code...belongsTo: appartenir à
    return $this->belongsTo(Category::class);
}
public function users(){
 return $this->belongsToMany(User::class);}

}
