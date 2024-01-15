<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'prix_achat', 'prix_vente', 'stock', 'nombre_packets', 'code_barre'];

}
